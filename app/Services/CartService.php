<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\VariationOption;
use Illuminate\Support\Facades\Auth;

class CartService
{
    protected $model;
    protected $variationModel;

    public function __construct(Cart $model, VariationOption $variationModel)
    {
        $this->model = $model;
        $this->variationModel = $variationModel;
    }

    public function showCartItem(){
        $cart = $this->model::with('products')->where('user_id', Auth::user()->id)->get();
        return $cart;
    }

    public function storeCart($data)
    {
        if ($this->model::where('product_id', $data['product_id'])->exists()) {
            return [
                "status" => "error",
                "message" => "This product is already in the cart",
            ];
        }

        $product_id = $data['product_id'];
        if(isset($data['variable_id']) && $data['variable_id'] != null){
            $product_id = $this->variationModel::where('id', $data['variable_id'])->value("product_id");
        }
        $cart = new $this->model();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $product_id;
        $cart->variation_id = $data['variable_id'] ?? null;
        return $cart->save()
            ? ["status" => "success", "message" => "Product added to cart"]
            : ["status" => "error", "message" => "Failed to add product to cart"];
    }

    public function storeCartArray($data)
    {
        $cart = null;
        foreach($data as $item){
            $product_id = $item['product_id'];
            if(isset($item['variable_id']) && $item['variable_id'] != null){
                $product_id = $this->variationModel::where('id', $item['variable_id'])->value("product_id");
            }

            $products = $this->model::where('user_id', Auth::user()->id)->where('product_id', $product_id)->get();
            if(isset($products) && count($products) == 0){
                $cart = new $this->model();
                $cart->user_id = Auth::user()->id;
                $cart->product_id = $product_id;
                $cart->variation_id = $item['variable_id'] ?? null;
                $cart->save();
            }
        }
        return $cart;
    }

    public function deleteCartItem($product_id){
        return $this->model::where('product_id', $product_id)->delete();
    }
}
