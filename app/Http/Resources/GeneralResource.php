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
        if($this->type == "home_banner"){
            return [
                "id" => $this->id,
                "text" => $this->name,
                "banner" => asset('assets/wolpin_media/general/homepage/' . $this->main_image),
                "logo" => asset('assets/wolpin_media/general/homepage/' . $this->image),
                "button_link" => $this->link,
            ];
        }

        if($this->type == "home_video"){
            return [
                "id" => $this->id,
                "video" => asset('assets/wolpin_media/general/homepage/' . $this->link),
            ];
        }
        return parent::toArray($request);
    }
}
