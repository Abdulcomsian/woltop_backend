<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeliveryResource;
use App\Models\DeliveryDetail;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function deliveryDetails(){
        try{
            $details = DeliveryDetail::get();
            if($details && count($details) > 0){
                return DeliveryResource::collection($details)->additional([
                    'status' => true,
                ]);
            }else{
                return response()->json(['status' => false, "data" => "No Delivery Details Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }
}
