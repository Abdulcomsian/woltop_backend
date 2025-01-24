<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(BlogDataTable $product)
    {
        return $product->render("pages.blog.index");
    }

    public function create(){
        return view('pages.blog.create');
    }
}
