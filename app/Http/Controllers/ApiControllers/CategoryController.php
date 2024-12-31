<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategories(){
        try{
            $categories = Category::get();
            if($categories && count($categories) > 0){
                return response()->json(['status' => true, "data" => $categories], 200);
            }else{
                return response()->json(['status' => false, "data" => "No category found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong"], 400);
        }
    }
}
