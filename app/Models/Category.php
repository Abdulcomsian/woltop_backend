<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public function parentCategory(){
        return $this->belongsTo(ParentCategory::class, 'parent_category_id');
    }

    // Define the many-to-many relationship with the Product model
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_categories');
    }
}
