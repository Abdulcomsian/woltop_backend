<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReelResource;
use App\Models\Reel;
use Illuminate\Http\Request;

class ReelController extends Controller
{
    public function getReels(){
        try{
            $reels = Reel::get();
            if($reels && count($reels) > 0){
                return ReelResource::collection($reels)->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "data" => "No Reel Found!"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }
}
