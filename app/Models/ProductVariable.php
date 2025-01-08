<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariable extends Model
{
    use HasFactory;

    protected $table  = "variables_products";

    public function attributes(){
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }
}
