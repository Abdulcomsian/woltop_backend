<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParentCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "parent_categories";

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($parentCategory) {
            if ($parentCategory->categories()->exists()) {
                throw new \Exception('Cannot delete this parent category because it has associated categories.');
            }
        });
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
}
