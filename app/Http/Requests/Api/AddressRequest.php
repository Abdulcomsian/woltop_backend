<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required",
            "email" => "required",
            "phone_number" => "required|integer",
            "pincode" => "required|integer",
            "city" => "required",
            "state" => "required",
            "address" => "required",
            "locality" => "required",
            "landmark" => "sometimes",
            "delivery_preference_id" => "required",
        ];
    }
}
