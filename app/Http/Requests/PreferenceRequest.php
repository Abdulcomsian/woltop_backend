<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreferenceRequest extends FormRequest
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
                "id" => "required",
                "name" => "required",
                "time" => "required",
            ];
        }

        return [
            "preferences" => "required|array",
            "preferences.*.name" => "required",
            "preferences.*.time" => "required",
        ];
    }
}
