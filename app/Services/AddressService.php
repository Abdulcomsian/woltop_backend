<?php

namespace App\Services;

use App\Models\AddressDetail;
use Illuminate\Support\Facades\Auth;

class AddressService
{
    protected $model;

    public function __construct(AddressDetail $model)
    {
        $this->model = $model;
    }

    public function showCartItem(){
        $cart = $this->model::with('products')->where('user_id', Auth::user()->id)->get();
        return $cart;
    }

    public function store($data)
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        $save = new $this->model;
        $save->name = $data['name'];
        $save->phone_number = $data['phone_number'];
        $save->pincode = $data['pincode'];
        $save->city = $data['city'];
        $save->state = $data['state'];
        $save->address = $data['address'];
        $save->locality = $data['locality'];
        $save->landmark = $data['landmark'] ?? null;
        $save->delivery_preference = $data['delivery_preference'];
        $save->save();
        return $save;
    }

    public function deleteCartItem($product_id){
        return $this->model::where('product_id', $product_id)->delete();
    }
}
