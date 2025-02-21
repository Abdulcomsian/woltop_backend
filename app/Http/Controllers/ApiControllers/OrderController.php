<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function store(OrderRequest $request){
        try{
            $this->service->store($request->validated());
            return response()->json(['status' => true, "msg" => "Order Placed Successfully"], 200); 
        }catch(\Exception $e){
            return response()->json(['status' => false, "msg" => "Something went wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 500);
        }
    }

}
