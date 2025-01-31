<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "color_id" => $this->color_id,
            "title" => $this->title,
            "price" => $this->price,
            "sale_price" => $this->sale_price,
            "discount" => $this->discount,
            "range" => calculateRange($this->variables),
            "variables" => $this->variables->map(function($item){
                return [
                    "id" => $item->id,
                    "title" => $item->title,
                    "price" => $item->price,
                    "sale_price" => $item->sale_price,
                    "discount" => $item->discount,
                    "options" => collect(json_decode($item->options, true))->mapWithKeys(function ($option) {
                        return [$option['name'] => $option['value']];
                    }),
                ];
            }),
            "featured_image" => asset('assets/wolpin_media/products/featured_images/' . $this->featured_image),
        ];
    }
}
