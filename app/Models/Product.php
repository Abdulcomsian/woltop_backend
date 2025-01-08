<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function productTag()
    {
        return $this->hasMany(ProductTag::class)->withTrashed();
    }

    public function CategoryProduct(){
        return $this->hasMany(CategoryProduct::class, "product_id");
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    // Define the many-to-many relationship with the Category model
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories', 'product_id', 'category_id');
    }

    // Define the many-to-many relationship with the Tag model
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }

    // Use the categories relationship to access parent category via the Category model
    public function parentCategory()
    {
        return $this->hasOneThrough(ParentCategory::class, Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->withTrashed();
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'product_id');
    }

    public function deliveryDetail(){
        return $this->hasMany(DeliveryDetail::class, 'product_id');
    }

    public function doDont(){
        return $this->hasMany(DosDont::class, 'product_id');
    }

    public function designApplicationGuide(){
        return $this->hasMany(ApplicationGuide::class, "product_id");
    }

    public function storageUsage(){
        return $this->hasMany(StorageUsage::class, "product_id");
    }

    public function variables()
    {
        return $this->belongsToMany(
            AttributeValue::class,
            'variables_products',  // Pivot table
            'product_id',         // Foreign key on variables_products
            'attribute_value_id'  // Foreign key on attribute_values
        );
    }

    // Custom Helper function for Related Products 
    public function getRelatedProducts()
    {
        $categoryIds = $this->categories()->select('categories.id')->pluck('id')->toArray();
        $products = Product::whereHas('categories', function($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })->limit(4)->get();

        $final = $products->map(function($data){
            return [
                "id" => $data->id,
                "title" => $data->title,
                "price" => $data->price,
                "sale_price" => $data->sale_price,
                "image" => asset('assets/wolpin_media/products/featured_images/' . $data->featured_image),
            ];
        });
        return $final;
    }
}
