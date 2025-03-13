<?php

namespace App\Models;

use App\Http\Resources\ProductResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PDO;

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

    public function productCategories(){
        return $this->hasMany(CategoryProduct::class, "product_id");
    }

    // Define the many-to-many relationship with the Tag model
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }

    public function productTags(){
        return $this->hasMany(ProductTag::class, 'product_id');
    }

    // Use the categories relationship to access parent category via the Category model
    public function parentCategory()
    {
        return $this->hasOneThrough(ParentCategory::class, Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
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
        return $this->hasOne(ApplicationGuide::class, "product_id");
    }

    public function storageUsage(){
        return $this->hasOne(StorageUsage::class, "product_id");
    }

    public function variables()
    {
        return $this->hasMany(VariationOption::class, "product_id");
    }

    public function productVariables(){
        return $this->hasMany(ProductVariable::class, 'product_id');
    }

    public function productOrder(){
        return $this->hasMany(ProductOrder::class, 'product_id');
    }

    public function installationSteps(){
        return $this->hasMany(InstallationStep::class, 'product_id');
    }

    public function productsFeatures(){
        return $this->hasMany(ProductFeature::class, 'product_id');
    }

    public function upsellProduct(){
        return $this->hasMany(UpSellModel::class, 'product_id');
    }

    // Custom Helper function for Related Products 
    public function getRelatedProducts()
    {
        $categoryIds = $this->categories()->select('categories.id')->pluck('id')->toArray();
        $products = Product::whereHas('categories', function($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })->limit(4)->get();
        return ProductResource::collection($products);
    }
}
