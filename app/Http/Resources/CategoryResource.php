<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            "name" => $this->name,
            "description" => $this->description,
            "image" => asset('assets/wolpin_media/categories/' . $this->image),
            "banner" => $this->banner_image ? asset('assets/wolpin_media/categories/' . $this->banner_image) : null,
            "video" => $this->video ? asset('assets/wolpin_media/categories/' . $this->video) : null,
            "intro_heading" => $this->intro_heading,
            "intro_description" => $this->intro_description,
        ];
    }
}
