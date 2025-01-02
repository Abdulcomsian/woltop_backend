<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\StoryResource;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function getStories(){
        try{
            $stories = Story::get();
            if($stories && count($stories) > 0){
                return StoryResource::collection($stories)->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "data" => "No Story Found!"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }
}
