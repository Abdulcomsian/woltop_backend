<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function showCartItems(){
        try{
            $data = $this->cartService->showCartItem();
            if($data && count($data) > 0){
                return CartResource::collection($data)->additional(['status' => true]);
            }else{
                return response()->json(['status' => false, "data" => "Cart is empty"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }

    public function storeCart(Request $request){
        $request->validate([
            "product_id" => "nullable|required_without_all:variable_id",
            "variable_id" => "nullable|required_without_all:product_id",
        ]);

        try{
            $response = $this->cartService->storeCart($request->all());
            if($response['status'] == "success"){
                return response()->json(['status' => true, "msg" => $response['message']], 200);
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }

    public function deleteCartItem($id){
        try{
            $response = $this->cartService->deleteCartItem($id);
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
