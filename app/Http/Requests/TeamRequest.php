<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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

        if($this->isMethod("PATCH")){
            return [
                "id" => "sometimes",
                "image" => "sometimes",
                "name" => "required",
                "designation" => "required",
                "bio" => "required",
                "portfolio_website" => "sometimes",
                "linkedIn_profile" => "sometimes",
                "facebook_profile" => "sometimes",
                "x_profile" => "sometimes",
                "youtube_profile" => "sometimes",
            ];
        }


        return [
            "image" => "required",
            "name" => "required",
            "designation" => "required",
            "bio" => "required",
            "portfolio_website" => "sometimes",
            "linkedIn_profile" => "sometimes",
            "facebook_profile" => "sometimes",
            "x_profile" => "sometimes",
            "youtube_profile" => "sometimes",
        ];
    }
}
