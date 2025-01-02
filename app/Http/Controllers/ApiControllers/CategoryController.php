<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategories(){
        try{
            $categories = Category::get();
            if($categories && count($categories) > 0){
                return CategoryResource::collection($categories)->additional(['status' => true]);
            }else{
                return response()->json(['status' => false, "data" => "No category found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong"], 400);
        }
    }

    public function getAllRoomCategories(){
        try{
            $categories = Category::where('parent_category_id', config('constants.ROOM'))->get();
            if($categories && count($categories) > 0){
                return CategoryResource::collection($categories)->additional(['status' => true]);
            }else{
                return response()->json(['status' => false, "data" => "No category found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong"], 400);
        }
    }
}
    