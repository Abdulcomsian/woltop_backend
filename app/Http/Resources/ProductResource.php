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
            "featured_image" => asset('assets/wolpin_media/products/featured_images/' . $this->featured_image),
        ];
    }
}
