<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UsersDataTable $product)
    {
        return $product->render("pages.users.index");
    }

    public function create(){
        return view('pages.users.create');
    }
}
