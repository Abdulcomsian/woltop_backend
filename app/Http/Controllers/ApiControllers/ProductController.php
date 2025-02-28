<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductReviewResource;
use App\Http\Resources\ToolkitResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function popularProducts(){
        try{
            $popularProducts = Product::whereHas('productTag', function($query){
                $query->where('tag_id', config('constants.POPULAR'));
            })
            ->where('status', 'publish')
            ->latest()
            ->limit(8)
            ->get();
            if($popularProducts && count($popularProducts) > 0){ 
                return ProductResource::collection($popularProducts)->additional([
                    'status' => true,
                ]);
            }else{
                return response()->json(['status' => false, "data" => "No Products Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }

    public function getToolkit(){
        try{
            $toolkit = Product::where('status', 'publish')->where('is_installable', "false")->first();
            if($toolkit && !empty($toolkit)){
                return (new ToolkitResource($toolkit))->additional(['status' => true]);
            }else{
                return response()->json(['status' => false, "data" => "No Toolkit Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }

    public function allProducts(){
        try{
            $products = Product::where('status', 'publish')
            ->latest()
            ->get();
            if($products && count($products) > 0){ 
                return ProductResource::collection($products)->additional([
                    'status' => true,
                ]);
            }else{
                return response()->json(['status' => false, "data" => "No Products Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }

    public function getProductsByColor($id){
        try{
            $products = Product::where('color_id', $id)->limit(4)->get();
            if($products && count($products) > 0){
                return ProductResource::collection($products)->additional([
                    'status' => true,
                ]);
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
            ->where('status', 'publish')
            ->limit(4)->get();

            if($products && count($products) > 0){
                return ProductResource::collection($products)->additional([
                    'status' => true,
                ]);
            }else{
                return response()->json(['status' => false, "data" => "No Products Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }

    public function getProductById($id){
        try{
            $product = Product::with('reviews')->where('id', $id)->where('status', 'publish')->first();
            if($product){
                return (new ProductReviewResource($product))->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "data" => "No Product Found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong!"], 400);
        }
    }
}
