<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\FaqDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(FaqDataTable $product)
    {
        return $product->render("pages.faq.index");
    }

    public function create(){
        return view('pages.faq.create');
    }
}
