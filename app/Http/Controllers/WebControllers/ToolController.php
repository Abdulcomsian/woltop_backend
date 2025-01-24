<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\ToolDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index(ToolDataTable $datatable)
    {
        return $datatable->render("pages.tools.index");
    }
}
