<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "title",
        "description",
        "main_image",
        "image",
        "link",
        "video",
        "consulation_img_1",
        "consulation_img_2",
        "type",
    ];
}
