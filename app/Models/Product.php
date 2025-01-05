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
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
