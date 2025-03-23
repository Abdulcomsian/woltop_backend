<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RequiredIfStatusAndType;
use App\Rules\RequiredIfStatusAndTypeVariable;
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
            $updateArray = [
                "id" => "sometimes",
                "product_name" => "required_if:status,publish",
                "short_description" => "sometimes",
                "description" => "required_if:status,publish",
                "status" => "required|in:draft,publish",
                "is_installable" => "sometimes",
                "featured_image" => "sometimes",
                "video" => "sometimes",
                "gallery_images" => "sometimes|array",
                "gallery_images.*" => "image|mimes:jpeg,png,jpg,gif,svg",
                "tags" => "sometimes|array",
                "color" => "sometimes",
                "product_type" => "required|in:simple,variable",
                "simple_price" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
                "simple_sale_price" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
                "simple_sku" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
                "simple_units" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
                "variations" => [new RequiredIfStatusAndTypeVariable($status, $productType), "array"],
                "variations.*.attribute_id" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
                "variations.*.attribute_values" => [new RequiredIfStatusAndTypeVariable($status, $productType), "array"],
                "variation_options" => [new RequiredIfStatusAndTypeVariable($status, $productType), "array"],
                "variation_options.*.id" => "nullable",
                "variation_options.*.name" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
                "variation_options.*.price" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
                "variation_options.*.sale_price" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
                "variation_options.*.sku" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
                "variation_options.*.units" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
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
                "installation_steps.*.id" => "sometimes",
                "installation_steps.*.type" => "sometimes",
                "installation_steps.*.installation_name" => "sometimes",
                "installation_steps.*.installation_description" => "sometimes",
                "installation_steps.*.installation_image" => "sometimes",
                "removed_steps" => "sometimes|array",
                "product_features" => "sometimes|array",
                "product_features.*.id" => "sometimes",
                "product_features.*.type" => "sometimes",
                "product_features.*.name" => "sometimes",
                "product_features.*.image" => "sometimes",
                "removed_features" => "sometimes|array",
                "meta_title" => "sometimes",
                "meta_description" => "sometimes",
                "upsell_products" => "sometimes|array",
            ];

            if($this->input('is_installable_type') == "toolkit"){
               $updateArray["categories"] = "sometimes";
            }else{
                $updateArray["categories"] = ["required_if:status,publish", "array"];
            }
            return $updateArray;
        }
        
        return [
            "product_name" => "required_if:status,publish",
            "short_description" => "sometimes",
            "description" => "required_if:status,publish",
            "status" => "required|in:draft,publish",
            "is_installable" => "sometimes",
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
            "simple_units" => ["sometimes", new RequiredIfStatusAndType($status, $productType)],
            "variations" => [new RequiredIfStatusAndTypeVariable($status, $productType), "array"],
            "variations.*.attribute_id" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
            "variations.*.attribute_values" => [new RequiredIfStatusAndTypeVariable($status, $productType), "array"],
            "variation_options" => [new RequiredIfStatusAndTypeVariable($status, $productType), "array"],
            "variation_options.*.name" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
            "variation_options.*.price" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
            "variation_options.*.sale_price" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
            "variation_options.*.sku" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
            "variation_options.*.units" => [new RequiredIfStatusAndTypeVariable($status, $productType)],
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
            "upsell_products" => "sometimes|array",
        ];
    }
}
