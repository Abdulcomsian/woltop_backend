<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDetail extends Model
{
    use HasFactory;
    protected $table = "address_details";

    protected $fillable = ['user_id', 'name', 'phone_number', 'pincode', 'city', 'state', 'address', 'locality', 'landmark', 'delivery_preference_id'];

    public function deliveryPreference(){
        return $this->belongsTo(DeliveryPreference::class, 'delivery_preference_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order(){
        return $this->hasMany(Order::class, 'address_id');
    }
}
