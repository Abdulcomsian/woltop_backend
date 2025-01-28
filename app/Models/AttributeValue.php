<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $table = "attribute_values";

    public function variables(){
        return $this->hasMany(ProductVariable::class, 'attribute_value_id');
    }

    public function attribute(){
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
