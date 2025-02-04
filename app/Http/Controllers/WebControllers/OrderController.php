<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // protected $service;

    // public function __construct(FaqService $service)
    // {
    //     $this->service = $service;
    // }

    public function index(OrderDataTable $product)
    {
        return $product->render("pages.order.index");
    }

    // public function create(){
    //     return view('pages.faq.create');
    // }
    
    // public function store(FaqRequest $request){
    //     try{
    //         $this->service->store($request->validated());
    //         toastr()->success('Faqs Saved Successfully!');
    //         return redirect()->route('faq.index');
    //     }catch(\Exception $e){
    //         toastr()->error("Something went wrong");
    //         return redirect()->back();
    //     }
    // }

    // public function edit($id){
    //     try{
    //         $data = $this->service->edit($id);
    //         return response()->json(['success' => true, "data" => $data], 200);
    //     }catch(\Exception $e){
    //         return response()->json(['success' => false, "msg" => "Something went wrong"], 400);
    //     }
    // }

    // public function update(FaqRequest $request){
    //     try{
    //         $this->service->update($request->validated());
    //         toastr()->success('Faq Updated Successfully!');
    //         return redirect()->back();
    //     }catch(\Exception $e){
    //         toastr()->error("Something went wrong");
    //         return redirect()->back();
    //     }
    // }

    // public function delete(FaqRequest $request){
    //     try{
    //         $this->service->delete($request->validated());
    //         toastr()->success('Faq Deleted Successfully!');
    //         return redirect()->back();
    //     }catch(\Exception $e){
    //         toastr()->error("Something went wrong");
    //         return redirect()->back();
    //     }
    // }
}
