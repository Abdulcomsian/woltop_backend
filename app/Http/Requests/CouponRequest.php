<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if($this->isMethod("DELETE")){
            return [
                "id" => "required",
            ];
        }
        
        return [
            "id" => "sometimes",
            "name" => "required",
            "short_description" => "required",
            "description" => "required",
            "type" => "required",
            "price" => "required",
            "is_countable" => "required|in:yes,no",
            "counting" => "required_if:is_countable,yes",
            "start_date" => "required_if:is_countable,no",
            "end_date" => "required_if:is_countable,no",
            "status" => "required|in:active,disable",
        ];
    }
}
