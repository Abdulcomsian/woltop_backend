<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "id" => "nullable",
            "banner_text" => "required",
            "button_link" => "required",
            "banner_image" => "sometimes",
            "banner_logo" => "sometimes",
            "video" => "sometimes",
        ];
    }
}
