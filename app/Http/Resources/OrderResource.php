<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "order_id" => $this->order_id,
            "total_mrp" => $this->total_mrp,
            "cart_discount" => $this->cart_discount,
            "shipping_charges" => $this->shipping_charges,
            "need_installation_service" => $this->need_installation_service,
            "installation_charges" => $this->installation_charges,
            "price_unit" => $this->price_unit,
            "toolkit_id" => $this->toolkit_id,
            "total_amount" => $this->total_amount,
            "payment_status" => $this->payment_status,
            "order_status" => $this->order_status,
            "address" => [
                "id" => $this->address->id,
                "name" => $this->address->name,
                "phone_number" => $this->address->phone_number,
                "pincode" => $this->address->pincode,
                "city" => $this->address->city,
                "state" => $this->address->state,
                "address" => $this->address->address,
                "locality" => $this->address->locality,
                "landmark" => $this->address->landmark,
                "delivery_preference" => [
                    "id" => $this->address->deliveryPreference->id,
                    "name" => $this->address->deliveryPreference->name,
                    "time" => $this->address->deliveryPreference->time,
                ],
            ],
            "user" => $this->user,
            "products" => $this->products->map(function($data){
                $products = [
                    "id" => $data->id,
                    "title" => $data->title,
                    "short_description" => $data->short_description,
                    "featured_image" => asset('assets/wolpin_media/products/featured_images/' . $data->featured_image),
                    "type" => $data->product_type,
                    "quantity" => $this->productOrder->where('product_id', $data->id)->value("quantity"),
                ];

                if($data->product_type == "simple"){
                    $products['price'] = $data->price;
                    $products['sale_price'] = $data->sale_price;
                }

                if($data->product_type == "variable"){
                    $products['price'] = variablePrice($this->productOrder->where('product_id', $data->id)->value("variable_id"));
                    $products['sale_price'] = variableSalePrice($this->productOrder->where('product_id', $data->id)->value("variable_id"));
                }
                
                return $products;
            }),
        ];
    }
}
