<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerUser(RegisterRequest $request){
        // dd($request->all());
        try{
            // $user = User::create();
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong"], 400); 
        }
    }
}
