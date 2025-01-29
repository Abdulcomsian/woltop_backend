<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\ReelDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReelRequest;
use App\Services\ReelService;
use Illuminate\Http\Request;

class ReelsController extends Controller
{
    protected $service;

    public function __construct(ReelService $service)
    {
        $this->service = $service;
    }

    public function index(ReelDataTable $datatable)
    {
        return $datatable->render("pages.reels.index");
    }

    public function store(ReelRequest $request){
        try{
            $this->service->store($request->validated());
            toastr()->success('Reel Saved Successfully!');
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

    public function update(ReelRequest $request){
        try{
            $data = $this->service->update($request->validated());
            toastr()->success('Reel Updated Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
    }

    public function delete(Request $request){
        try{
            $this->service->delete($request);
            toastr()->success('Reel Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
    }
}
