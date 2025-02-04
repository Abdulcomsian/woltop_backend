<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "email" => "required|email",
        ];
    }
}
