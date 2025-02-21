<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->type == "home"){
            return [
                "id" => $this->id,
                "name" => $this->name,
                "button_link" => $this->link,
                "banner" => asset("assets/wolpin_media/general/homepage/" . $this->main_image),
                "logo" => asset("assets/wolpin_media/general/homepage/" . $this->image),
                "video" => asset("assets/wolpin_media/general/homepage/" . $this->video),
            ];
        }

        if($this->type == "about"){
            $title = json_decode($this->title);
            $description = json_decode($this->description);
            return [
                "id" => $this->id,
                "name" => $this->name,
                "title" => $title->title,
                "team_title" => $title->team_title,
                "description" => $description->description,
                "team_description" => $description->team_description,
                "banner" => asset("assets/wolpin_media/general/about/" . $this->main_image),
                "logo" => asset("assets/wolpin_media/general/about/" . $this->image),
            ];
        }
        return parent::toArray($request);
    }
}
