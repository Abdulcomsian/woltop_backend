<?php

namespace App\Services;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductService
{
    protected $model;
    protected $attributeModel;
    protected $categoriesModel;
    public function __construct(Product $model, AttributeValue $attributeModel, Category $categoriesModel)
    {
        $this->model = $model;
        $this->attributeModel = $attributeModel;
        $this->categoriesModel = $categoriesModel;
    }

    public function store($data)
    {
        dd($data);
        $save = new $this->model;
        $save->title = $data['product_name'];
        $save->slug = Str::slug($data['product_name']);
        $save->short_description = $data['short_description'];
        $save->description = $data['description'];
        $save->video = $data['video'];
        if($data['product_type'] == "simple"){
            $save->price = $data['simple_price'];
            $save->sale_price = $data['simple_sale_price'];
            $save->sku = $data['simple_sku'];
        }
        $save->featured_image = $data['featured_image'];
        $save->product_type = $data['product_type'];
        $save->status = $data['status'];
        $save->meta_title = $data['meta_title'];
        $save->meta_description = $data['meta_description'];
        if($data['product_type'] == "simple"){
            $save->discount = calculateDiscount($data['price'], $data['sale_price']);
        }
        $save->save();
        return $save;
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
