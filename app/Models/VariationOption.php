<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariationOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "variation_options";

    protected $fillable = [
        "product_id",
        "title",
        "price",
        "sale_price",
        "discount",
        "sku",
        "options",
    ];
}
