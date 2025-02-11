<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeliveryPreferenceResource;
use App\Models\DeliveryPreference;
use Illuminate\Http\Request;

class DeliveryPreferenceController extends Controller
{
    public function index(){
        try{
            $data = DeliveryPreference::get();
            return DeliveryPreferenceResource::collection($data)->additional(['status' => true]);
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }
}
