<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddressRequest;
use App\Services\AddressService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $service;
    public function __construct(AddressService $service)
    {
        $this->service = $service;
    }


    public function store(AddressRequest $request){
        try{
            $data = $this->service->store($request->validated());
            return response()->json(['status' => true, "msg" => "Address Saved Successfully", "address_id" => $data->id, "user_id" => $data->user->id], 200);
        }catch(\Exception $e){
            return response()->json(['status' => false, "msg" => "Something went wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 500);
        }
    }
}
