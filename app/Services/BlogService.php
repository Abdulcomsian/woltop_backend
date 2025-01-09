<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogService
{
    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function getBlog(){
        $blog = $this->model->get();
        return $blog;
    }

    public function getDetail($slug){
        $blog = $this->model->where('slug', $slug)->first();
        return $blog;
    }

}
