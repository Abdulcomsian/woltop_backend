<?php

namespace App\Services;

use App\Models\ApplicationGuide;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\DosDont;
use App\Models\InstallationStep;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\ProductVariable;
use App\Models\StorageUsage;
use App\Models\UpSellModel;
use App\Models\VariationOption;

class ProductService
{
    protected $model;
    protected $attributeModel;
    protected $categoriesModel;
    protected $productImagesModel;
    protected $productCategoryModel;
    protected $productTagModel;
    protected $dosProductModel;
    protected $installationStepsModel;
    protected $productFeatureModel;
    protected $variableProductModel;
    protected $variationOptionModel;
    protected $applicationDetailModel;
    protected $storageDetailModel;
    protected $upSellModel;


    public function __construct(
        Product $model, 
        AttributeValue $attributeModel, 
        Category $categoriesModel, 
        ProductImage $productImagesModel, 
        CategoryProduct $productCategoryModel, 
        ProductTag $productTagModel, 
        DosDont $dosProductModel, 
        InstallationStep $installationStepsModel, 
        ProductFeature $productFeatureModel, 
        ProductVariable $variableProductModel, 
        VariationOption $variationOptionModel,
        ApplicationGuide $applicationDetailModel,
        StorageUsage $storageDetailModel,
        UpSellModel $upSellModel,
    )
    {
        $this->model = $model;
        $this->attributeModel = $attributeModel;
        $this->categoriesModel = $categoriesModel;
        $this->productImagesModel = $productImagesModel;
        $this->productCategoryModel  = $productCategoryModel;
        $this->productTagModel = $productTagModel;
        $this->dosProductModel = $dosProductModel;
        $this->installationStepsModel = $installationStepsModel;
        $this->productFeatureModel = $productFeatureModel;
        $this->variableProductModel = $variableProductModel;
        $this->variationOptionModel = $variationOptionModel;
        $this->applicationDetailModel = $applicationDetailModel;
        $this->storageDetailModel = $storageDetailModel;
        $this->upSellModel = $upSellModel;
    }

    public function store($data)
    {
        // Storing Featured Image
        if(isset($data['featured_image'])){
            $featureFileName = rand() . '.' . $data['featured_image']->extension();
            $path = public_path("assets/wolpin_media/products/featured_images");
            $data['featured_image']->move($path, $featureFileName);
        }

        // Storing Video
        if(isset($data['video'])){
            $videoFileName = rand() . '.' . $data['video']->getClientOriginalExtension();
            $path = public_path("assets/wolpin_media/products/video");
            $data['video']->move($path, $videoFileName);
        }

        $product = new $this->model;
        $product->title = $data['product_name'];
        $product->color_id = $data['color'];
        $product->slug = generateUniqueSlug($data['product_name'], $this->model::class, "slug");
        $product->short_description = $data['short_description'];
        $product->description = $data['description'];
        $product->video = $videoFileName ?? null;
        if($data['product_type'] == "simple"){
            $product->price = $data['simple_price'];
            $product->sale_price = $data['simple_sale_price'];
            $product->sku = generateUniqueSku($data['simple_sku'], $this->model::class, 'sku');
        }
        $product->featured_image = $featureFileName ?? null;
        $product->product_type = $data['product_type'];
        $product->status = $data['status'];
        // if(isset($data['is_installable']) && $data['is_installable'] == "on"){
        //     $product->is_installable = "true";
        // }else{
        //     $product->is_installable = "false";
        // }
        $product->meta_title = $data['meta_title'];
        $product->meta_description = $data['meta_description'];
        if($data['product_type'] == "simple"){
            $product->discount = calculateDiscount($data['simple_price'], $data['simple_sale_price']);
        }
        if($product->save()){
            // Storing Gallery Images
            if(isset($data['gallery_images']) && count($data['gallery_images']) > 0){
                foreach($data['gallery_images'] as $image){
                    $fileName = rand() . '.' . $image->extension();
                    $path = public_path("assets/wolpin_media/products/gallery_images");
                    $image->move($path, $fileName);
                    $img = new $this->productImagesModel;
                    $img->product_id = $product->id;
                    $img->image_path = $fileName;
                    $img->save();
                }
            }

            // Storing Categories
            if(isset($data['categories']) && count($data['categories']) > 0){
                foreach($data['categories'] as $category){
                    $cat = new $this->productCategoryModel;
                    $cat->product_id = $product->id;
                    $cat->category_id = $category;
                    $cat->save();
                }
            }

            // Storing tags
            if(isset($data['tags']) && count($data['tags']) > 0){
                foreach($data['tags'] as $tag){
                    $pTag = new $this->productTagModel;
                    $pTag->product_id = $product->id;
                    $pTag->tag_id = $tag;
                    $pTag->save();
                }
            }

            // Storing Dos and Donts
            if(isset($data['dos_dont']) && count($data['dos_dont']) > 0){
                foreach($data['dos_dont'] as $item){
                    $dos = new $this->dosProductModel;
                    $dos->product_id = $product->id;
                    $dos->name = $item;
                    $dos->save();
                }
            }

            
            // Storing Installation Steps
            if(isset($data['installation_steps']) && count($data['installation_steps']) > 0){
                foreach($data['installation_steps'] as $item){
                    $step = new $this->installationStepsModel;
                    $step->product_id = $product->id;
                    $step->name = $item['installation_name'];
                    $step->description = $item['installation_description'];
                    // Storing file
                    if(isset($item['installation_image']) && !empty($item['installation_image'])){
                        $imageName = rand() . '.' . $item['installation_image']->extension();
                        $path = public_path("assets/wolpin_media/installation_steps");
                        $item['installation_image']->move($path, $imageName);
                        $step->image = $imageName;
                    }
                    $step->save();
                }
            }
            // Storing Product Features
            if(isset($data['product_features']) && count($data['product_features']) > 0){
                foreach($data['product_features'] as $item){
                    $feature = new $this->productFeatureModel;
                    $feature->product_id = $product->id;
                    $feature->name = $item['name'];
                    // Storing file
                    if(isset($item['image']) && !empty($item['image'])){
                        $featureImage = rand() . '.' . $item['image']->extension();
                        $path = public_path("assets/wolpin_media/products/features");
                        $item['image']->move($path, $featureImage);
                        $feature->image = $featureImage;
                    }
                    $feature->save();
                }
            }

            // Storing Upsell products
            if(isset($data['upsell_products']) && count($data['upsell_products']) > 0){
                foreach($data['upsell_products'] as $item){
                    $upsell = new $this->upSellModel;
                    $upsell->product_id = $product->id;
                    $upsell->other_related_product_id = $item;
                    $upsell->save();
                }
            }

            // Storing Variable Data
            if($data['product_type'] == "variable"){
                 // Storing Variable Products
                if(isset($data['variations']) && count($data['variations']) > 0){
                    foreach($data['variations'] as $item){
                        if(isset($item['attribute_values']) && count($item['attribute_values']) > 0){
                            foreach($item['attribute_values'] as $subItem){
                                $attr = new $this->variableProductModel;
                                $attr->attribute_value_id = $subItem;
                                $attr->product_id = $product->id;
                                $attr->save();
                            }
                        }
                    }
                }

                if(isset($data['variation_options']) && count($data['variation_options']) > 0){
                    foreach($data['variation_options'] as $item){
                        $names = explode('/', $item['name']);
                        $attribute_values = $this->attributeModel::with('attribute')->whereIn("name", $names)->get()
                        ->map(function($item){
                            return [
                                "name" => $item->attribute->name,
                                "value" => $item->name,
                            ];
                        })
                        ->toArray();
                        $variation = new $this->variationOptionModel;
                        $variation->product_id = $product->id;
                        $variation->title = $item['name'];
                        $variation->price = $item['price'];
                        $variation->sale_price = $item['sale_price'];
                        $variation->options = !empty($attribute_values) ? json_encode($attribute_values) : null;
                        $variation->discount = calculateDiscount($item['price'], $item['sale_price']);
                        $variation->sku = generateUniqueSku($item['sku'], $this->variationOptionModel::class, 'sku');;
                        $variation->save();
                    }
                }
                
            }

            $applicationData = [
                'room_type' => $data['room_type'] ?? null,
                'finish_type' => $data['finish_type'] ?? null,
                'pattern_repeat' => $data['pattern_repeat'] ?? null,
                'pattern_match' => $data['pattern_match'] ?? null,
                'application_guide' => $data['application_guide'] ?? null,
            ];
            
            if (!empty(array_filter($applicationData))) {
                $application = new $this->applicationDetailModel;
                $application->product_id = $product->id;
                $application->fill($applicationData);
                $application->save(); 
            }
            
            $storageData = [
                "storage" => $data['storage'] ?? null,
                "net_weight" => $data['net_weight'] ?? null,
                "coverage" => $data['coverage'] ?? null,
            ];

            if(!empty(array_filter($storageData))){
                $st = new $this->storageDetailModel;
                $st->product_id = $product->id;
                $st->fill($storageData);
                $st->save();
            }
            
        }
        return $product;
    }

    public function delete($data)
    {
        $product = $this->model->findOrFail($data['id']);
        $product->images()->delete();
        $product->productCategories()->delete();
        $product->productTags()->delete();
        $product->doDont()->delete();
        $product->installationSteps()->delete();
        $product->productsFeatures()->delete();
        $product->variables()->delete();
        $product->productVariables()->delete();
        $product->designApplicationGuide()->delete();
        $product->storageUsage()->delete();
        return $product->delete();
    }

    public function edit($id)
    {
        return $this->model::findOrFail($id);
    }

    public function updateProductImage($id, $filename, $model, $column){
        return $model::where('id', $id)->update([
            $column => $filename,
        ]);
    }

    public function optimizeImage($imagePath, $outputPath, $size)
    {
        try{        
            $nodeScript = base_path('node_scripts/sharp.js');
            // Execute the Node.js script
            $command = "node $nodeScript " . escapeshellarg($imagePath) . " " . escapeshellarg($outputPath) . " " . $size;
            exec($command, $output, $status);

            if ($status === 0) {
                return response()->json(['message' => 'Image optimized successfully', 'filename' => basename($outputPath)]);
            } else {
                return response()->json(['error' => 'Image optimization failed'], 500);
            }
        }catch(\Exception $e){
            dd($e->getMessage(), $e->getLine());
        }
    }


    public function optimize($id)
    {
        $status = true;
        $product = $this->model::findOrFail($id);
        // for featured Image
        $featuredImage = public_path("assets/wolpin_media/products/featured_images/" . $product->featured_image);
        $featuredOuput = public_path('assets/wolpin_media/products/featured_images/' . 'optimized_' . rand() . '_' . basename($featuredImage));
        $result = $this->optimizeImage($featuredImage, $featuredOuput, "1600 2700");
        $data = $result->getData();
        if(isset($data->error)){
            $status = false;
        }else{
            $initialFilename = explode(".", $data->filename);
            $filename = $initialFilename[0] . ".webp";
            $this->updateProductImage($id, $filename, $this->model, "featured_image");
        }
        

        // for gallery images
        $galleryImages = $this->productImagesModel::where('product_id', $id)->get();
        if(isset($galleryImages) && count($galleryImages) > 0){
            foreach($galleryImages as $image){
                $galleryImage = public_path("assets/wolpin_media/products/gallery_images/" . $image->image_path);
                $galleryOutputImage = public_path('assets/wolpin_media/products/gallery_images/' . 'optimized_' . rand() . '_' . basename($galleryImage));
                $result = $this->optimizeImage($galleryImage, $galleryOutputImage, "1600 2700");
                $data = $result->getData();
                if(isset($data->error)){
                    $status = false;
                }else{
                    $initialFilename = explode(".", $data->filename);
                    $filename = $initialFilename[0] . ".webp";
                    $this->updateProductImage($image->id, $filename, $this->productImagesModel, "image_path");
                }
            }
        }





        if($status == true){
            return [
                "status" => true,
                "message" => "Image optimization successfull"
            ];
        }else{
            return [
                "status" => false,
                "message" => "Image optimization failed"
            ];
        }
    }

    public function update($data)
    {
        $product = $this->model::findOrFail($data['id']);
        // Storing Featured Image
        if(isset($data['featured_image'])){
            // removing old file from server folder
            if($product && $product->featured_image != null){
                $oldPath = public_path("assets/wolpin_media/products/featured_images" . $product->featured_image);
                if(file_exists($oldPath)){
                    unlink($oldPath);
                }
            }

            $featureFileName = rand() . '.' . $data['featured_image']->extension();
            $path = public_path("assets/wolpin_media/products/featured_images");
            $data['featured_image']->move($path, $featureFileName);
        }

        // Storing Video
        if(isset($data['video'])){
            if($product && $product->video != null){
                $oldPath = public_path("assets/wolpin_media/products/video" . $product->video);
                if(file_exists($oldPath)){
                    unlink($oldPath);
                }
            }
            $videoFileName = rand() . '.' . $data['video']->getClientOriginalExtension();
            $path = public_path("assets/wolpin_media/products/video");
            $data['video']->move($path, $videoFileName);
        }

        $product->title = $data['product_name'];
        $product->color_id = $data['color'];
        $product->slug = generateUniqueSlug($data['product_name'], $this->model::class, "slug");
        $product->short_description = $data['short_description'];
        $product->description = $data['description'];
        if(isset($data['video'])){
            $product->video = $videoFileName ?? null;
        }
        if($data['product_type'] == "simple"){
            // deleting variables against this product if any case Admin Switch from variable to simple
            $this->variableProductModel::where('product_id', $data['id'])->forceDelete();
            $this->variationOptionModel::where('product_id', $data['id'])->delete();

            $product->price = $data['simple_price'];
            $product->sale_price = $data['simple_sale_price'];
            $product->sku = generateUniqueSku($data['simple_sku'], $this->model::class, 'sku');
        }elseif($data['product_type'] == "variable"){
            $product->price = null;
            $product->sale_price = null;
            $product->sku = null;
        }

        if(isset($data['featured_image'])){
            $product->featured_image = $featureFileName ?? null;
        }
        $product->product_type = $data['product_type'];
        $product->status = $data['status'];
        // if(isset($data['is_installable']) && $data['is_installable'] == "on"){
        //     $product->is_installable = "true";
        // }else{
        //     $product->is_installable = "false";
        // }
        $product->meta_title = $data['meta_title'] ?? null;
        $product->meta_description = $data['meta_description'] ?? null;
        if($data['product_type'] == "simple"){
            $product->discount = calculateDiscount($data['simple_price'], $data['simple_sale_price']);
        }
        if($product->save()){
            // Storing Gallery Images
            if(isset($data['gallery_images']) && count($data['gallery_images']) > 0){
                foreach($data['gallery_images'] as $image){
                    $fileName = rand() . '.' . $image->extension();
                    $path = public_path("assets/wolpin_media/products/gallery_images");
                    $image->move($path, $fileName);
                    $img = new $this->productImagesModel;
                    $img->product_id = $product->id;
                    $img->image_path = $fileName;
                    $img->save();
                }
            }

            // Storing Categories
            if(isset($data['categories']) && count($data['categories']) > 0){
                $this->productCategoryModel::where('product_id', $product->id)->forceDelete();
                foreach($data['categories'] as $category){
                    $cat = new $this->productCategoryModel;
                    $cat->product_id = $product->id;
                    $cat->category_id = $category;
                    $cat->save();
                }
            }

            // Storing tags
            if(isset($data['tags']) && count($data['tags']) > 0){
                $this->productTagModel::where('product_id', $product->id)->forceDelete();
                foreach($data['tags'] as $tag){
                    $pTag = new $this->productTagModel;
                    $pTag->product_id = $product->id;
                    $pTag->tag_id = $tag;
                    $pTag->save();
                }
            }

            // Storing Dos and Donts
            if(isset($data['dos_dont']) && count($data['dos_dont']) > 0){
                $this->dosProductModel::where('product_id', $product->id)->forceDelete();
                foreach($data['dos_dont'] as $item){
                    $dos = new $this->dosProductModel;
                    $dos->product_id = $product->id;
                    $dos->name = $item;
                    $dos->save();
                }
            }

            
            // Storing Installation Steps
            if(isset($data['installation_steps']) && count($data['installation_steps']) > 0){
                // Delete old installation steps and images
                if(isset($data['removed_steps'])){
                    $oldInstallationSteps = $this->installationStepsModel::whereIn('id', $data['removed_steps'])->get();
                    foreach ($oldInstallationSteps as $step) {
                        if (!empty($step->image)) {
                            $oldPath = public_path("assets/wolpin_media/installation_steps/" . $step->image);
                            if (is_file($oldPath)) {
                                @unlink($oldPath);
                            }
                        }
                        $step->forceDelete();
                    }
                }

                foreach($data['installation_steps'] as $item){
                    if(isset($item['type']) && $item['type'] == "existing"){
                        $step = $this->installationStepsModel::findOrFail($item['id']);
                        $step->product_id = $product->id;
                        $step->name = $item['installation_name'];
                        $step->description = $item['installation_description'];
                        // Storing file
                        if(isset($item['installation_image']) && !empty($item['installation_image'])){
                            $imageName = rand() . '.' . $item['installation_image']->extension();
                            $path = public_path("assets/wolpin_media/installation_steps");
                            $item['installation_image']->move($path, $imageName);
                            $step->image = $imageName;
                        }
                        $step->save();
                    }else{
                        $step = new $this->installationStepsModel;
                        $step->product_id = $product->id;
                        $step->name = $item['installation_name'];
                        $step->description = $item['installation_description'];
                        // Storing file
                        if(isset($item['installation_image']) && !empty($item['installation_image'])){
                            $imageName = rand() . '.' . $item['installation_image']->extension();
                            $path = public_path("assets/wolpin_media/installation_steps");
                            $item['installation_image']->move($path, $imageName);
                            $step->image = $imageName;
                        }
                        $step->save();
                    }
                }
            }

            // Storing Upsell products
            if(isset($data['upsell_products']) && count($data['upsell_products']) > 0){
                $this->upSellModel::where('product_id', $product->id)->delete();
                foreach($data['upsell_products'] as $item){
                    $upsell = new $this->upSellModel;
                    $upsell->product_id = $product->id;
                    $upsell->other_related_product_id = $item;
                    $upsell->save();
                }
            }

            // Storing Product Features
            if(isset($data['product_features']) && count($data['product_features']) > 0){
                // deleting old feature and image from the server
                if(isset($data['removed_features'])){
                    $oldFeatures = $this->productFeatureModel::whereIn('id', $data['removed_features'])->get();
                    foreach ($oldFeatures as $feature) {
                        if (!empty($feature->image)) {
                            $oldPath = public_path("assets/wolpin_media/products/features" . $feature->image);
                            if (is_file($oldPath)) {
                                @unlink($oldPath);
                            }
                        }
                        $feature->forceDelete();
                    }
                }


                foreach($data['product_features'] as $item){
                    if(isset($item['type']) && $item['type'] == "existing"){
                        $feature = $this->productFeatureModel::findOrFail($item['id']);
                        $feature->product_id = $product->id;
                        $feature->name = $item['name'];
                        // Storing file
                        if(isset($item['image']) && !empty($item['image'])){
                            $featureImage = rand() . '.' . $item['image']->extension();
                            $path = public_path("assets/wolpin_media/products/features");
                            $item['image']->move($path, $featureImage);
                            $feature->image = $featureImage;
                        }
                        $feature->save();
                    }else{
                        $feature = new $this->productFeatureModel;
                        $feature->product_id = $product->id;
                        $feature->name = $item['name'];
                        // Storing file
                        if(isset($item['image']) && !empty($item['image'])){
                            $featureImage = rand() . '.' . $item['image']->extension();
                            $path = public_path("assets/wolpin_media/products/features");
                            $item['image']->move($path, $featureImage);
                            $feature->image = $featureImage;
                        }
                        $feature->save();
                    }
                }
            }

            // Storing Variable Data
            if($data['product_type'] == "variable"){
                 // Storing Variable Products
                if(isset($data['variations']) && count($data['variations']) > 0){
                    $this->variableProductModel::where('product_id', $product->id)->forceDelete();
                    foreach($data['variations'] as $item){
                        if(isset($item['attribute_values']) && count($item['attribute_values']) > 0){
                            foreach($item['attribute_values'] as $subItem){
                                $attr = new $this->variableProductModel;
                                $attr->attribute_value_id = $subItem;
                                $attr->product_id = $product->id;
                                $attr->save();
                            }
                        }
                    }
                }


                if(isset($data['variation_options']) && count($data['variation_options']) > 0){
                    $delete_all_variations = true;
                    foreach($data['variation_options'] as $item){
                        if(isset($item['id'])){
                            $delete_all_variations = false;
                        }
                    }
                    if($delete_all_variations == true){
                        $this->variationOptionModel::where('product_id', $product->id)->delete();
                    }



                    foreach($data['variation_options'] as $item){
                        $names = explode('/', $item['name']);
                        $attribute_values = $this->attributeModel::with('attribute')->whereIn("name", $names)->get()
                        ->map(function($item){
                            return [
                                "name" => $item->attribute->name,
                                "value" => $item->name,
                            ];
                        })
                        ->toArray();
                        $this->variationOptionModel::updateOrCreate([
                            "id" => $item['id'] ?? 0,
                        ],[
                            "product_id" => $product->id,
                            "title" => $item['name'],
                            "price" => $item['price'],
                            "sale_price" => $item['sale_price'],
                            "options" => !empty($attribute_values) ? json_encode($attribute_values) : null,
                            "discount" => calculateDiscount($item['price'], $item['sale_price']),
                            "sku" => generateUniqueSku($item['sku'], $this->variationOptionModel::class, 'sku'),
                        ]);
                    }
                }
                
            }

            $applicationData = [
                'room_type' => $data['room_type'] ?? null,
                'finish_type' => $data['finish_type'] ?? null,
                'pattern_repeat' => $data['pattern_repeat'] ?? null,
                'pattern_match' => $data['pattern_match'] ?? null,
                'application_guide' => $data['application_guide'] ?? null,
            ];
            
            if (!empty(array_filter($applicationData))) {
                $this->applicationDetailModel::where('product_id', $product->id)->forceDelete();
                $application = new $this->applicationDetailModel;
                $application->product_id = $product->id;
                $application->fill($applicationData);
                $application->save(); 
            }
            
            $storageData = [
                "storage" => $data['storage'] ?? null,
                "net_weight" => $data['net_weight'] ?? null,
                "coverage" => $data['coverage'] ?? null,
            ];

            if(!empty(array_filter($storageData))){
                $this->storageDetailModel::where('product_id', $product->id)->forceDelete();
                $st = new $this->storageDetailModel;
                $st->product_id = $product->id;
                $st->fill($storageData);
                $st->save();
            }
            
        }
        return $product;
    }

    public function fetchAttributeValues($data){
        return $this->attributeModel::where('attribute_id', $data->attribute_id)->get();
    }

    public function getCategories($request)
    {
        $query = $this->categoriesModel::query();

        if ($request->parent_category_id === "none") {
            $query->whereNull('parent_category_id');
        } elseif ($request->parent_category_id !== "all") {
            $query->where('parent_category_id', $request->parent_category_id);
        }

        return $query->get();
    }

    public function deleteImage($data){
        $delete = $this->productImagesModel::findOrFail($data->image_id);
        if($delete && $delete->image_path != null){
            $oldPath = public_path("assets/wolpin_media/products/gallery_images" . $delete->image_path);
            if(file_exists($oldPath)){
                unlink($oldPath);
            }
        }
        return $delete->delete();
    }
}
