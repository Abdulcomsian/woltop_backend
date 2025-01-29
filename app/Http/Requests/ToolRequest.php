<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToolRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "id" => "sometimes",
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "sale_price" => "required",
            "image" => "required",
        ];
    }
}
