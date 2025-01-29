<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\ToolDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ToolRequest;
use App\Services\ToolService;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    protected $service;

    public function __construct(ToolService $service)
    {
        $this->service = $service;
    }

    public function index(ToolDataTable $datatable)
    {
        return $datatable->render("pages.tools.index");
    }

    public function store(ToolRequest $request){
        try{
            $this->service->store($request->validated());
            toastr()->success('Tool Saved Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function update(ToolRequest $request){
        try{
            $this->service->update($request->validated());
            toastr()->success('Tool Saved Successfully!');
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

    public function delete(ToolRequest $request){
        try{
            $this->service->delete($request->validated());
            toastr()->success('Tool Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

}
