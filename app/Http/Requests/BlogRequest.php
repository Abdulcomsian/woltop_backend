<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
                "id" => "sometimes",
            ];
        }
        
        return [
            "id" => "sometimes",
            "image" => $this->isMethod("post") ? "required" : "sometimes",
            "title" => "required",
            "short_description" => "required",
            "description" => "required",
        ];
    }
}
