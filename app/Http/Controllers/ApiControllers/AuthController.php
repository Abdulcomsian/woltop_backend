<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function registerUser(RegisterRequest $request){
        try{
            $user = $this->userService->store($request);
            
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong"], 400); 
        }
    }
}
