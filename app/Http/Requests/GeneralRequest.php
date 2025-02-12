<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "id" => "required",
            "banner_text" => "required",
            "button_link" => "required",
            "banner_image" => "sometimes",
            "banner_logo" => "sometimes",
        ];
    }
}
