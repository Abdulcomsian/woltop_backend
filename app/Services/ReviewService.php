<?php

namespace App\Services;

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
        $reviews = $this->model::with('user')->where('product_id', $id)->paginate(5);
        return $reviews;
    }

    public function getReviews(){
        return $this->model::get();
    }
}
