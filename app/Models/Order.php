<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function address(){
        return $this->belongsTo(AddressDetail::class, 'address_id');
    }

    public function productOrder(){
        return $this->hasMany(ProductOrder::class);
    }
}
