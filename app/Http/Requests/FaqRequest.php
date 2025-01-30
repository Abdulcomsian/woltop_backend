<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if($this->isMethod("DELETE")){ // for delete
            return [
                "id" => "required",
            ];
        }
        
        if($this->isMethod("PATCH")){ // for update
            return [
                "id" => "sometimes",
                "question" => "required",
                "answer" => "required",
            ];
        }

        // for add 
        return [
            "id" => "sometimes",
            "faqs" => "required|array",
            "faqs.*.question" => "required",
            "faqs.*.answer" => "required",
        ];
    }
}
