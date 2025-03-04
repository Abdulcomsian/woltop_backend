<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\CareerResource;
use App\Services\CareerService;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    protected $service;
    public function __construct(CareerService $service)
    {
        $this->service = $service;
    }

    public function index(){
        try{
            $data = $this->service->index();
            if($data && count($data) > 0){
                return CareerResource::collection($data)->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "msg" => "No Job found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }
}
