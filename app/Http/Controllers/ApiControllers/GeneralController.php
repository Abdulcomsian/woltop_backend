<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Services\GeneralService;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    protected $service;
    public function __construct(GeneralService $service)
    {
        $this->service = $service;
    }


    public function getHomeBanner(){
        try{
            $data = $this->service->getHomeBanner();
            if($data){
                return (new GeneralResource($data))->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "msg" => "No Data found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400);
        }
    }
}
