<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StorageUsage extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "storage_usage_guide";

    protected $fillable = [
        "storage",
        "net_weight",
        "coverage",
    ];
}
