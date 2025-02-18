<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if($this->type == "charges"){
            return [
                "id" => $this->id,
                "installation_charges" => $this->installation_charges,
                "cod_charges" => $this->cash_on_delivery_charges,
                "shipping_charges" => $this->shipping_charges,
                "threshold_charges" => $this->threshold_charges,
                "price_unit" => $this->unit,
            ];
        }

        if($this->type == "footer_information"){
            return [
                "id" => $this->id,
                "contact_number" => $this->contact_no,
                "address" => $this->address,
                "email" => $this->email,
                "facebook_link" => $this->facebook_link,
                "twitter_link" => $this->twitter_link,
                "instagram_link" => $this->instagram_link,
            ];
        }
        return parent::toArray($request);
    }
}
