<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function getAllColors(){
        try{
            $colors = Color::get();
            if($colors && count($colors) > 0){
                return response()->json(['status' => true, "data" => $colors], 200);
            }else{
                return response()->json(['status' => false, "data" => "No Color found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong"], 400);
        }
    }
}
