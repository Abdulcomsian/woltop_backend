<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function popularProducts(){
        try{
            $popularProducts = Product::whereHas('productTag', function($query){
                $query->where('tag_id', config('constants.POPULAR'));
            })
            ->get();
            if($popularProducts && count($popularProducts) > 0){
                return response()->json(['status' => true, "data" => $popularProducts], 200);
            }else{
                return response()->json(['status' => false, "data" => "No Products Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }

    public function getProductsByColor($id){
        try{
            $products = Product::where('color_id', $id)->get();
            if($products && count($products) > 0){
                return response()->json(['status' => true, "data" => $products], 200);
            }else{
                return response()->json(['status' => false, "data" => "No Products Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }

    public function getProductsByTag($id){
        try{
            $products = Product::whereHas('productTag', function($query) use ($id){
                $query->where('tag_id', $id);
            })
            ->get();

            if($products && count($products) > 0){
                return response()->json(['status' => true, "data" => $products], 200);
            }else{
                return response()->json(['status' => false, "data" => "No Products Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }
}
