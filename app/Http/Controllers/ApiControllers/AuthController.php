<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Services\UserService;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Test\Constraint\RequestAttributeValueSame;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function registerUser(RegisterRequest $request){
        try{
            $response = $this->userService->store($request);
            if($response['status'] == "success"){
                return response()->json(['status' => true, "msg" => $response['message']], 200);
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }

    public function verifyEmail($token, $user){
        try{
            $response = $this->userService->verifyEmail($token, $user);
            if($response['status'] == "success"){
                return redirect()->away(env('APP_URL'));
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }

    public function loginUser(LoginRequest $request){
        try{
            $response = $this->userService->login($request);
            if($response['status'] == "success"){
                return response()->json(['status' => true, "access_token" => $response['access_token'], "type" => $response['type'], "msg" => $response['message']], 200);
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400);
        }
    }

    public function logoutUser(){
        try{
            $response = $this->userService->logout();
            if($response['status'] == "success"){
                return response()->json(['status' => true, "msg" => $response['message']], 200);
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400);
        }
    }

    public function sendEmailForgotPassword(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        try{
            $email = $request->email;
            $response = $this->userService->sendEmail($email);
            if($response['status'] == "success"){
                return response()->json(['status' => true, "msg" => $response['message'], "user_id" => $response['user_id']], 200);
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400);
        }
    }

    public function verifyCode(Request $request){
        $request->validate([
            "code" => ['required', 'integer'],
            "user_id" => ["required"],
        ]);

        try{
            $response = $this->userService->verifyCode($request);
            if($response['status'] == "success"){
                return response()->json(['status' => true, "msg" => $response['message'], "user_id" => $response['user_id']], 200);
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400);
        }
    }

    public function updatePassword(Request $request){
        $request->validate([
            "user_id" => ['required'],
            "password" => ['required'],
        ]);

        try{
            $response = $this->userService->updatePassword($request);
            if($response['status'] == "success"){
                return response()->json(['status' => true, "msg" => $response['message']], 200);
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400);
        }
    }

    public function resendCode(Request $request){
        $request->validate([
            "user_id" => "required",
        ]);

        try{
            $response = $this->userService->resendCode($request);
            if($response['status'] == "success"){
                return response()->json(['status' => true, "msg" => $response['message'], "user_id" => $response['user_id']], 200);
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400);
        }
    }
}
