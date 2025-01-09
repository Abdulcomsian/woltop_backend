<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartService
{
    protected $model;

    public function __construct(Cart $model)
    {
        $this->model = $model;
    }

    public function showCartItem(){
        $cart = Cart::with('products')->where('user_id', Auth::user()->id)->get();
        return $cart;
    }

    public function storeCart($data)
    {
        if (Cart::where('product_id', $data->product_id)->exists()) {
            return [
                "status" => "error",
                "message" => "This product is already in the cart",
            ];
        }
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $data->product_id;
        return $cart->save()
            ? ["status" => "success", "message" => "Product added to cart"]
            : ["status" => "error", "message" => "Failed to add product to cart"];
    }

    public function deleteCartItem($product_id){
        return Cart::where('product_id', $product_id)->delete();
    }
}
