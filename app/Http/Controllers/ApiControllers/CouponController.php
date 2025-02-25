<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        try{
            $data = Coupon::where('status', 'active')->get();
            if($data && count($data) > 0){
                return CouponResource::collection($data)->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "data" => "No Data found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong"], 400);
        }
    }
}
