<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Services\CouponService;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $service;

    public function __construct(CouponService $service)
    {
        $this->service = $service;
    }


    public function index(CouponDataTable $product)
    {
        return $product->render("pages.coupon.index");
    }

    public function create(){
        return view('pages.coupon.create');
    }

    public function store(CouponRequest $request){
        try{
            $this->service->store($request->validated());
            toastr()->success('Coupon Saved Successfully!');
            return redirect()->route('coupon.index');
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function update(CouponRequest $request){
        try{
            $this->service->update($request->validated());
            toastr()->success('Coupon Updated Successfully!');
            return redirect()->route('coupon.index');
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function edit($id){
        try{
            $data = $this->service->edit($id);
            return view("pages.coupon.edit", compact("data"));
        }catch(\Exception $e){
            return response()->json(['success' => false, "msg" => "Something went wrong"], 400);
        }
    }

    public function delete(CouponRequest $request){
        try{
            $this->service->delete($request->validated());
            toastr()->success('Coupon Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
