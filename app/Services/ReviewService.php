<?php

namespace App\Services;

use App\Enums\ReviewStatus;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewService
{
    protected $model;

    public function __construct(Review $model)
    {
        $this->model = $model;
    }

    public function storeReview($data){
        $review = new $this->model();
        $review->user_id = Auth::user()->id;
        $review->product_id = $data->product_id;
        $review->description = $data->description;
        $review->rating = $data->rating;
        if(isset($data->type) && $data->type == "admin"){
            $review->status = ReviewStatus::APPROVED;
        }else{
            $review->status = ReviewStatus::PENDING;
        }
        if($review->save()){
            return [
                "status" => "success",
                "message" => "Review Saved Successfully",
            ];
        }else{
            return [
                "status" => "error",
                "message" => "Review haven`t saved successfully",
            ];
        }
    }

    public function getReviewByProduct($id){
        $reviews = $this->model::with('user')->where('product_id', $id)->where('status', ReviewStatus::APPROVED)->paginate(5);
        return $reviews;
    }

    public function getReviews(){
        return $this->model::where('status', ReviewStatus::APPROVED)->get();
    }

    public function changeStatus($data){
        $change = $this->model::findOrFail($data['id']);
        if($change && isset($data['status']) && $data['status'] == true){
            $change->status = ReviewStatus::APPROVED;
        }else{
            $change->status = ReviewStatus::PENDING;
        }

        return $change->save();
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['id']);
        $destroy->delete();
    }
}
