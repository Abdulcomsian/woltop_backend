<?php

namespace App\Services;

use App\Models\User;
use Notification;
use App\Notifications\{
    RegisterNotification,
    NotifyUserOtp,
};
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        $save = new $this->model;
        $save->name = $data->name;
        $save->email = $data->email;
        $save->password = Hash::make($data->password);
        $save->email_verification_token = rand(0000, 9999);
        if($save->save()){
            $save->assignRole("user");
            try{
                Notification::route('mail', $save->email)->notify(new RegisterNotification($save->id, $save->email_verification_token, $save->name));
                return [
                    'status' => 'success',
                    'message' => 'Email verification token sent successfully to ' . $save->email,
                    'data' => $save,
                ];
            }catch(\Exception $e){
                return [
                    'status' => 'error',
                    'message' => 'Failed to send Verification email to ' . $save->email,
                    'error' => $e->getMessage(),
                ];
            }
        }else{
            return [
                'status' => 'error',
                'message' => 'Failed to save user data',
                'data' => null
            ];
        }
    }

    public function verifyEmail($data, $user){
        $token = Crypt::decrypt($data);
        $user = Crypt::decrypt($user);
        $data = $this->model->findOrFail($user);
        if($data && $data->email_verification_token == $token){
            $data->email_verified_at = Carbon::now();
            $data->email_verification_token = null;
            if($data->update()){
                return [
                    'status' => 'success',
                    'message' => 'Email Verified Successfully',
                ];
            }else{
                return [
                    'status' => 'error',
                    'message' => 'Email haven`t verified',
                ];
            }
        }else{
            return [
                'status' => 'error',
                'message' => 'No user found',
            ];
        }
    }


    public function login($data){
        $user = $this->model::where('email', $data->email)->first();
        if(!$user || !Auth::attempt(['email' => $data->email, 'password' => $data->password])){
            return [
                "status" => "error",
                "message" => "Invalid Cradentials",
            ];
        }

        if($user->email_verified_at == null){
            return [
                "status" => "error",
                "message" => "Email is not verified",
            ];
        }

        // creating a login token
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        return [
            "status" => "success",
            "access_token" => $token,
            "type" => "Bearer",
            "message" => "User Login Successfully",
        ];
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        return [
            "status" => "success",
            "message" => "User Logout Successfully",
        ];
    }

    public function sendEmail($email){
        $user = $this->model::where('email', $email)->first();
        if($user && $user != null){
            $code = rand(0000, 9999);
            $user->update(['otp_code' => $code]);
            try{
                Notification::route('mail', $email)->notify(new NotifyUserOtp($code));
                return [
                    "status" => "success",
                    "message" => "A code has been sent to your email",
                    "user_id" => $user->id,
                ];
            }catch(\Exception $e){
                return [
                    "status" => "error",
                    "message" => "Email couldn`t delivered",
                ];
            }
        }else{
            return [
                "status" => "error",
                "message" => "No record found against this email",
            ];
        }
    }

    public function verifyCode($data){
        $user = $this->model::findOrFail($data->user_id);
        if($user && $user != null){
            if($user->otp_code == $data->code){
                $user->otp_code = null;
                if($user->update()){
                    return [
                        "status" => "success",
                        "message" => "Code has been verified",
                        "user_id" => $user->id,
                    ];
                }
            }else{
                return [
                    "status" => "error",
                    "message" => "Code verification failed",
                ];
            }
        }else{
            return [
                "status" => "error",
                "message" => "No user found against this id",
            ];
        }
    }

    public function updatePassword($data){
        $user = $this->model::findOrFail($data->user_id);
        if($user && $user != null){
            $user->password = Hash::make($data->password);
            if($user->update()){
                return [
                    "status" => "success",
                    "message" => "Password has been updated Successfully",
                ];
            }else{
                return [
                    "status" => "error",
                    "message" => "Password cannot be updated at this time. Please try again in a while",
                ];
            }
        }else{
            return [
                "status" => "error",
                "message" => "No user found against this id",
            ];
        }
    }

    public function resendCode($data){
        $user = $this->model::findOrFail($data->user_id);
        if($user && $user != null){
            $code = rand(0000, 9999);
            $user->otp_code = $code;
            $user->update();
            try{
                Notification::route('mail', $user->email)->notify(new NotifyUserOtp($code));
                return [
                    "status" => "success",
                    "message" => "A code has been sent to your email",
                    "user_id" => $user->id,
                ];
            }catch(\Exception $e){
                return [
                    "status" => "error",
                    "message" => "Email couldn`t delivered",
                ];
            }
        }else{
            return [
                "status" => "error",
                "message" => "No record found against this id",
            ];
        }
    }
}
