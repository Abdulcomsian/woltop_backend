<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "product_name" => "required",
            "description" => "required",
            "status" => "required",
            "featured_image" => "required",
            "video" => "required",
            "gallery_images" => "sometimes|array",
            "gallery_images.*" => "image|mimes:jpeg,png,jpg,gif,svg",
            "categories" => "required|array",
            "tags" => "sometimes|array",
            "color" => "sometimes",
            "product_type" => "required|in:simple,variable",
            "simple_price" => "required_if:product_type,simple",
            "simple_sale_price" => "required_if:product_type,simple",
            "simple_sku" => "required_if:product_type,simple",
            "variations" => ["required_if:product_type,variable", "array"],
            "variations.*.attribute_id" => ["required_if:product_type,variable"],
            "variations.*.attribute_values" => ["required_if:product_type,variable", "array"],
            "variations.*.price" => ["required_if:product_type,variable"],
            "variations.*.sale_price" => ["required_if:product_type,variable"],
            "variations.*.sku" => ["required_if:product_type,variable"],
            "dos_dont" => "required|array",
            "room_type" => "required",
            "finish_type" => "required",
            "pattern_repeat" => "required",
            "pattern_match" => "required",
            "application_guide" => "required",
            "storage" => "required",
            "net_weight" => "required",
            "coverage" => "required",
            "installation_steps" => "required|array",
            "installation_steps.*.installation_name" => "required",
            "installation_steps.*.installation_description" => "required",
            "installation_steps.*.installation_image" => "required",
            "product_features" => "required|array",
            "product_features.*.name" => "required",
            "product_features.*.image" => "required",
            "meta_title" => "required",
            "meta_description" => "required",
        ];
    }
}
