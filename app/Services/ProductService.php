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
use App\Models\VariationOption;
use Illuminate\Support\Str;

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
            $videoFileName = rand() . '.' . $data['video']->extension();
            $path = public_path("assets/wolpin_media/products/video");
            $data['video']->move($path, $videoFileName);
        }

        $product = new $this->model;
        $product->title = $data['product_name'];
        $product->color_id = $data['color'];
        $product->slug = generateUniqueSlug($data['product_name'], $this->model::class, "slug");
        $product->short_description = $data['short_description'];
        $product->description = $data['description'];
        $product->video = $videoFileName;
        if($data['product_type'] == "simple"){
            $product->price = $data['simple_price'];
            $product->sale_price = $data['simple_sale_price'];
            $product->sku = generateUniqueSku($data['simple_sku'], $this->model::class, 'sku');
        }
        $product->featured_image = $featureFileName;
        $product->product_type = $data['product_type'];
        $product->status = $data['status'];
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
                        $path = public_path("assets/wolpin_media/products/featured_images");
                        $item['image']->move($path, $featureImage);
                        $feature->image = $featureImage;
                    }
                    $feature->save();
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
        // Find the product by ID
        $product = $this->model->findOrFail($data['product_id']);

        // Detach related categories from the pivot table
        $product->categories()->detach();

        // Detach related tags from the pivot table
        $product->tags()->detach();

        // Delete related product tags if they exist
        if ($product->productTag()->exists()) {
            $product->productTag()->delete();
        }

        // Delete related images
        if ($product->images()->exists()) {
            foreach ($product->images as $image) {
                // Optionally delete the physical file from storage
                if (file_exists(public_path($image->image_path))) {
                    unlink(public_path($image->image_path));
                }
                $image->delete();
            }
        }

        // Now delete the product
        return $product->delete();
    }

    public function edit($id)
    {
        return $this->model::findOrFail($id);
    }

    public function update($data)
    {
        $update = $this->model::findOrFail($data['parent_category_id']);
        $update->name = $data['name'];
        $update->save();

        return $update;
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
}
