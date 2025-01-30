<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if($this->isMethod("PATCH")){
            return [
                "id" => "required",
                "city" => "required",
                "day" => "required",
            ];
        }

        if($this->isMethod("DELETE")){
            return [
                "id" => "required",
            ];
        }
        
        return [
            "deliveries" => "required|array",
            "deliveries.*.city" => "required",
            "deliveries.*.days" => "required",
        ];
    }
}
