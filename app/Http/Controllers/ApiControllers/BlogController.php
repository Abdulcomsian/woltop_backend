<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function getBlogs(){
        try{
            $data = $this->blogService->getBlog();
            if($data && count($data) > 0){
                return BlogResource::collection($data)->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "msg" => "No blog found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }

    public function getBlogDetail($slug){
        try{
            $data = $this->blogService->getDetail($slug);
            if($data){
                return (new BlogResource($data))->additional(["status" => true]);
            }else{
                return response()->json(['status' => false, "msg" => "No blog found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }
}
