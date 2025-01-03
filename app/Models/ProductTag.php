<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products_tags";

    public function tag(){
        return $this->belongsTo(Tag::class, "tag_id");
    }
}
