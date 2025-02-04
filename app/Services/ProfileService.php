<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index(){
        return $this->model::whereHas('roles', function($query){
            $query->where('name', 'admin');
        })->first();
    }

    public function update($data){
        $update = $this->model::find($data['id']);
        $update->name = $data['name'];
        $update->email = $data['email'];
        $update->password = Hash::make($data['password']);
        $update->save();
        return $update;
    }
}
