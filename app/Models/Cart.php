<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsTo(Product::class, "product_id");
    }

    public function variation(){
        return $this->belongsTo(VariationOption::class, 'variation_id');
    }
}
