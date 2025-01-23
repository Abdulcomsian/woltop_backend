<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\StoryDataTable;
use App\Http\Controllers\Controller;
use App\Services\StoryService;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    protected $service;

    public function __construct(StoryService $service)
    {
        $this->service = $service;
    }

    public function index(StoryDataTable $datatable)
    {
        return $datatable->render("pages.stories.index");
    }
}
