<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "address_id" => "required",
            "total_mrp" => "required|numeric",
            "cart_discount" => "required|numeric",
            "shipping_charges" => "required|numeric",
            "need_installation_service" => "required",
            "installation_charges" => "required|integer",
            "total_amount" => "required|numeric",
            "toolkit_id" => "sometimes",
            "products_orders" => "required|array",
            "products_orders.*.product_id" => "nullable",
            "products_orders.*.quantity" => "required",
            "products_orders.*.variable_id" => "nullable",
        ];
    }
}