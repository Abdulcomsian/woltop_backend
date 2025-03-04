<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Notifications\ContactNotification;
use Notification;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(ContactRequest $request){
        try{
            Notification::route("mail", env("ADMIN_EMAIL"))->notify(new ContactNotification($request->name, $request->phone, $request->email, $request->message));
            return response()->json(['status' => true, "msg" => "Your message has been delivered successfully"], 200);
        }catch(\Exception $e){
            return response()->json(['status' => false, "msg" => "Something Went Wrong"], 400);
        }
    }
}
