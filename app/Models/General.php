<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "main_image",
        "image",
        "link",
        "type",
        "installation_charges",
        "cash_on_delivery_charges",
        "shipping_charges",
        "threshold_charges",
        "unit",
    ];
}
