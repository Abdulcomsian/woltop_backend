<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            "image" => asset('assets/wolpin_media/team/' . $this->image),
            "designation" => $this->designation,
            "bio" => $this->bio,
            "portfolio_website" => $this->portfolio_website,
            "linkedIn_profile" => $this->linkedIn_profile,
            "facebook_profile" => $this->facebook_profile,
            "x_profile" => $this->x_profile,
            "youtube_profile" => $this->youtube_profile,  
        ];
    }
}
