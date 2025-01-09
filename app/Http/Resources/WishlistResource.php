<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->products->id,
            "title" => $this->products->title,
            "short_description" => $this->products->short_description,
            "description" => $this->products->description,
            "price" => $this->products->price,
            "sale_price" => $this->products->sale_price,
            "discount" => $this->products->discount,
            "sku" => $this->products->sku,
            "image" => asset('assets/wolpin_media/products/featured_images/' . $this->products->featured_image),
        ];
    }
}
