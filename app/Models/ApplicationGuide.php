<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationGuide extends Model
{
    use HasFactory;
    protected $table = "application_details";

    protected $fillable = [
        "room_type",
        "finish_type",
        "pattern_repeat",
        "pattern_match",
        "application_guide",
    ];
}
