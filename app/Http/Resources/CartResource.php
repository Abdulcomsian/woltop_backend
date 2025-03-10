<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $array = [
            "id" => $this->products->id,
            "title" => $this->products->title,
            "short_description" => $this->products->short_description,
            "description" => $this->products->description,
            "image" => asset('assets/wolpin_media/products/featured_images/' . $this->products->featured_image),
        ];
        
        if(isset($this->variation_id) && $this->variation_id != null){ // which means its a variable product
            $array['price'] = $this->variation->price;
            $array['sale_price'] = $this->variation->sale_price;
            $array['discount'] = $this->variation->discount;
            $array['sku'] = $this->variation->sku;
        }else{ // means its a simple product
            $array['price'] = $this->products->price;
            $array['sale_price'] = $this->products->sale_price;
            $array['discount'] = $this->products->discount;
            $array['sku'] = $this->products->sku;
        }

        return $array;
    }
}
