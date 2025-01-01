<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getTags(){
        try{
            $tags = Tag::where('id', '!=', config('constants.POPULAR'))->get();
            if($tags && count($tags) > 0){
                return response()->json(['status' => true, "data" => $tags], 200);
            }else{
                return response()->json(['status' => false, "data" => "No Tags Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }
}
