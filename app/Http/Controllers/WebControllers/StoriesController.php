<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\StoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;
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

    public function store(StoryRequest $request){
        try{
            $this->service->store($request->validated());
            toastr()->success('Story Saved Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function edit($id){
        try{
            $data = $this->service->edit($id);
            return response()->json(['success' => true, "data" => $data], 200);
        }catch(\Exception $e){
            return response()->json(['success' => false, "msg" => "Something went wrong"], 400);
        }
    }
}
