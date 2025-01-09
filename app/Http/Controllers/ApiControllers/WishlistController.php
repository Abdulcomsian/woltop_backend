<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\WishlistResource;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    protected $wishlistService;
    public function __construct(WishlistService $wishlistService)
    {
        $this->wishlistService = $wishlistService;
    }

    public function showWishlistItems(){
        try{
            $data = $this->wishlistService->showWishlistItem();
            if($data && count($data) > 0){
                return WishlistResource::collection($data)->additional(['status' => true]);
            }else{
                return response()->json(['status' => false, "data" => "Wishlist is empty"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }

    public function storeWishlist(Request $request){
        $request->validate([
            "product_id" => "required",
        ]);

        try{
            $response = $this->wishlistService->storeWishlist($request);
            if($response['status'] == "success"){
                return response()->json(['status' => true, "msg" => $response['message']], 200);
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }

    public function deleteWishlistItem($id){
        try{
            $response = $this->wishlistService->deleteWishlistItem($id);
            if($response){
                return response()->json(['status' => true, "msg" => "Item removed successfully"], 200);
            }else{
                return response()->json(['status' => false, "msg" => "Failed to remove item"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }
}
