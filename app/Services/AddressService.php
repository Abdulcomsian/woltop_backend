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
    protected $userModel;

    public function __construct(AddressDetail $model, User $userModel)
    {
        $this->model = $model;
        $this->userModel = $userModel;
    }

    public function store($data)
    {
        $user = $this->userModel::where("email", $data['email'])->first();
        if($user != null){ // Already in the database
            $user_id = $user->id;
        }else{
            $new_user = new User;
            $new_user->name = $data['name'];
            $new_user->email = $data['email'];
            $new_user->email_verified_at = Carbon::now();
            $new_user->password = Hash::make("Pass@787#321");
            $new_user->save();
            $new_user->assignRole("user");
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
                "delivery_preference_id" => $data['delivery_preference_id'],
            ]
        );
        return $save;
    }
}
