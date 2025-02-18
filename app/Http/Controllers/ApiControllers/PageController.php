<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $service;
    public function __construct(PageService $service)
    {
        $this->service = $service;
    }

    public function getHome(){
        try{
            $data = $this->service->getHome();
            if($data){
                return (new PageResource($data))->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "msg" => "No Data found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400);
        }
    }

    public function getAbout(){
        try{
            $data = $this->service->getAbout();
            if($data){
                return (new PageResource($data))->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "msg" => "No Data found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400);
        }
    }
}
