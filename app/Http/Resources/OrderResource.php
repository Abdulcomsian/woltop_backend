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
            "products" => $this->products,
        ];
    }
}
