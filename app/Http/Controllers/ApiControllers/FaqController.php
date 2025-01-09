<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use App\Services\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $faqService;
    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function getFaqs(){
        try{
            $data = $this->faqService->getFaq();
            if($data && count($data) > 0){
                return FaqResource::collection($data)->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "msg" => "No blog found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }
}
