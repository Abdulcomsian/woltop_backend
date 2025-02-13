<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function storeReview(ReviewRequest $request){
        try{
            $response = $this->reviewService->storeReview($request);
            if($response['status'] == "success"){
                return response()->json(['status' => true, "msg" => $response['message']], 200);
            }else{
                return response()->json(['status' => false, "msg" => $response['message']], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }

    public function getReviewByProduct($id){
        try{
            $data = $this->reviewService->getReviewByProduct($id);
            if($data && count($data) > 0){
                return ReviewResource::collection($data)->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "data" => "No review found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }

    public function getReviews(){
        try{
            $data = $this->reviewService->getReviews();
            if($data && count($data) > 0){
                return ReviewResource::collection($data)->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "data" => "No review found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }
}
