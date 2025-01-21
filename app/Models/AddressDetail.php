<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDetail extends Model
{
    use HasFactory;
    protected $table = "address_details";

    protected $fillable = ['user_id', 'name', 'phone_number', 'pincode', 'city', 'state', 'address', 'locality', 'landmark', 'delivery_preference'];
}
