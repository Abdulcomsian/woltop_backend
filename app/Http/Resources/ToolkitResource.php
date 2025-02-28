<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ToolkitResource extends JsonResource
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
            "image" => asset("assets/wolpin_media/products/featured_images/" . $this->featured_image),
            "title" => $this->title,
            "slug" => $this->slug,
            "short_description" => $this->short_description,
            "long_description" => $this->description,
            "price" => $this->sale_price,
        ];
    }
}
