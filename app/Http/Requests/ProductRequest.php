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
            "short_description" => "sometimes",
            "description" => "required",
            "status" => "required",
            "featured_image" => "required",
            "video" => "sometimes",
            "gallery_images" => "sometimes|array",
            "gallery_images.*" => "image|mimes:jpeg,png,jpg,gif,svg",
            "categories" => "required|array",
            "tags" => "sometimes|array",
            "color" => "sometimes",
            "product_type" => "required|in:simple,variable",
            "simple_price" => "required_if:product_type,simple",
            "simple_sale_price" => "required_if:product_type,simple",
            "simple_sku" => "sometimes|required_if:product_type,simple",
            "variations" => ["required_if:product_type,variable", "array"],
            "variations.*.attribute_id" => ["required_if:product_type,variable"],
            "variations.*.attribute_values" => ["required_if:product_type,variable", "array"],
            "variation_options" => ["required_if:product_type,variable", "array"],
            "variation_options.*.name" => ["required_if:product_type,variable"],
            "variation_options.*.price" => ["required_if:product_type,variable"],
            "variation_options.*.sale_price" => ["required_if:product_type,variable"],
            "variation_options.*.sku" => ["required_if:product_type,variable"],
            "dos_dont" => "sometimes|array",
            "room_type" => "sometimes",
            "finish_type" => "sometimes",
            "pattern_repeat" => "sometimes",
            "pattern_match" => "sometimes",
            "application_guide" => "sometimes",
            "storage" => "sometimes",
            "net_weight" => "sometimes",
            "coverage" => "sometimes",
            "installation_steps" => "sometimes|array",
            "installation_steps.*.installation_name" => "sometimes",
            "installation_steps.*.installation_description" => "sometimes",
            "installation_steps.*.installation_image" => "sometimes",
            "product_features" => "sometimes|array",
            "product_features.*.name" => "sometimes",
            "product_features.*.image" => "sometimes",
            "meta_title" => "sometimes",
            "meta_description" => "sometimes",
        ];
    }
}
