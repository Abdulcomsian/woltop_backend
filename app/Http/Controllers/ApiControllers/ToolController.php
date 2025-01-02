<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\ToolResource;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function getTools(){
        try{
            $tools = Tool::get();
            if($tools && count($tools) > 0){
                return ToolResource::collection($tools)->additional(['status' => true]);
            }else{
                return response()->json(['status' => false, "data" => "No Tags Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }
}
