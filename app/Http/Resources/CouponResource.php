<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $array =  [
            "id" => $this->id,
            "code" => $this->name,
            "short_description" => $this->short_description,
            "long_description" => $this->long_description,
            "is_countable" => $this->is_countable,
            "counting" => $this->counting,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
        ];
        if($this->type == "percentage"){
            $array["percentage"] = $this->price;
        }

        if($this->type  == "fixed"){
            $array["price"] = $this->price;
        }
        

        return $array;
    }
}
