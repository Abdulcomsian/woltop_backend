<?php

namespace App\Services;

use App\Models\AddressDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user = User::where("email", $data['email'])->first();
        if($user != null){ // Already in the database
            $user_id = $user->id;
        }else{
            $new_user = new User;
            $new_user->name = $data['name'];
            $new_user->email = $data['email'];
            $new_user->email_verified_at = Carbon::now();
            $new_user->password = Hash::make(rand(11111, 99999));
            $new_user->save();
            $user_id  = $new_user->id;
        }
        $save = $this->model::updateOrCreate(
            [
                "user_id" => $user_id,
            ],
            [
                "name" => $data['name'],
                "phone_number" => $data['phone_number'],
                "pincode" => $data['pincode'],
                "city" => $data['city'],
                "state" => $data['state'],
                "address" => $data['address'],
                "locality" => $data['locality'],
                "landmark" => $data['landmark'] ?? null,
                "delivery_preference" => $data['delivery_preference'],
            ]
        );
        return $save;
    }

    public function deleteCartItem($product_id){
        return $this->model::where('product_id', $product_id)->delete();
    }
}
