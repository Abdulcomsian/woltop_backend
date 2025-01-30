<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\DeliveryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryRequest;
use App\Services\DeliveryService;
use Illuminate\Http\Request;

class DeliveryDetailController extends Controller
{
    protected $service;

    public function __construct(DeliveryService $service)
    {
        $this->service = $service;
    }

    public function index(DeliveryDataTable $product)
    {
        return $product->render("pages.delivery.index");
    }

    public function create(){
        return view('pages.delivery.create');
    }

    public function store(DeliveryRequest $request){
        try{
            $this->service->store($request->validated());
            toastr()->success('Delivery Details Saved Successfully!');
            return redirect()->route('delivery.index');
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

    public function update(DeliveryRequest $request){
        try{
            $this->service->update($request->validated());
            toastr()->success('Delivery Updated Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function delete(DeliveryRequest $request){
        try{
            $this->service->delete($request->validated());
            toastr()->success('Delivery Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
