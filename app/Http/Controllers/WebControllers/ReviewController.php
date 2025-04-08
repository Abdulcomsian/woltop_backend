<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\ReviewDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $service;

    public function __construct(ReviewService $service)
    {
        $this->service = $service;
    }


    public function index(ReviewDataTable $product)
    {
        return $product->render("pages.review.index");
    }

    public function changeStatus(ReviewRequest $request){
        try{
            $this->service->changeStatus($request->validated());
            return response()->json(['success' => true, "msg" => "Success"], 200);
        }catch(\Exception $e){
            return response()->json(['success' => false, "msg" => "Something went wrong"], 400);
        }
    }

    public function delete(ReviewRequest $request){
        try{
            $this->service->delete($request->validated());
            toastr()->success('Review Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
