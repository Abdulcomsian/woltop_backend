<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RequiredIfStatusAndType;
class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $status = $this->input('status');
        $productType = $this->input('product_type');

        if($this->isMethod("DELETE")){
            return [
                "id" => "sometimes",
            ];
        }

        if($this->isMethod("PATCH")){
            return [
                "id" => "sometimes",
                "product_name" => "required_if:status,publish",
                "short_description" => "sometimes",
                "description" => "required_if:status,publish",
                "status" => "required|in:draft,publish",
                "featured_image" => "sometimes",
                "video" => "sometimes",
                "gallery_images" => "sometimes|array",
                "gallery_images.*" => "image|mimes:jpeg,png,jpg,gif,svg",
                "categories" => ["required_if:status,publish", "array"],
                "tags" => "sometimes|array",
                "color" => "sometimes",
                "product_type" => "required|in:simple,variable",
                "simple_price" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
                "simple_sale_price" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
                "simple_sku" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
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
        
        return [
            "product_name" => "required_if:status,publish",
            "short_description" => "sometimes",
            "description" => "required_if:status,publish",
            "status" => "required|in:draft,publish",
            "featured_image" => "required_if:status,publish",
            "video" => "sometimes",
            "gallery_images" => "sometimes|array",
            "gallery_images.*" => "image|mimes:jpeg,png,jpg,gif,svg",
            "categories" => ["required_if:status,publish", "array"],
            "tags" => "sometimes|array",
            "color" => "sometimes",
            "product_type" => "required|in:simple,variable",
            "simple_price" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
            "simple_sale_price" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
            "simple_sku" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
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
