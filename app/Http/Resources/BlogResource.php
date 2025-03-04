<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            "user_id" => $this->user_id,
            "title" => $this->title,
            "slug" => $this->slug,
            "short_description" => $this->short_description,
            "description" => $this->description,
            "image" => asset('assets/wolpin_media/blogs/' . $this->image),
            "date" => date('l, d M Y', strtotime($this->created_at)),
        ];
    }
}
