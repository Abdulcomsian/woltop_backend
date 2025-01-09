<?php

namespace App\Services;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistService
{
    protected $model;

    public function __construct(Wishlist $model)
    {
        $this->model = $model;
    }

    public function showWishlistItem(){
        $wishlist = Wishlist::with('products')->where('user_id', Auth::user()->id)->get();
        return $wishlist;
    }

    public function storeWishlist($data)
    {
        if (Wishlist::where('product_id', $data->product_id)->exists()) {
            return [
                "status" => "error",
                "message" => "This product is already in the wishlist",
            ];
        }
        $cart = new Wishlist();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $data->product_id;
        return $cart->save()
            ? ["status" => "success", "message" => "Product added to wishlist"]
            : ["status" => "error", "message" => "Failed to add product to wishlist"];
    }

    public function deleteWishlistItem($product_id){
        return Wishlist::where('product_id', $product_id)->delete();
    }
}
