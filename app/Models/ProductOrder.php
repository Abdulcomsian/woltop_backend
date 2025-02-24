<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products_orders";

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variable(){
        return $this->belongsTo(VariationOption::class, 'variable_id');
    }
}
