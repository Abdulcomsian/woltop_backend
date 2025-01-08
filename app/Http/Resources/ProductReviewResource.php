<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductReviewResource extends JsonResource
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
            "short_description" => $this->short_description,
            "description" => $this->description,
            "discount" => $this->discount,
            "featured_image" => asset('assets/wolpin_media/products/featured_images/' . $this->featured_image),
            "reviews" => [
                "total_count" => $this->reviews->count(),
                "average" => $this->reviews->count() > 0 ? round($this->reviews->avg('rating'), 2) : 0,
                "five_star_count" => $this->reviews()->where('rating', 5)->count(),
                "four_star_count" => $this->reviews()->where('rating', 4)->count(),
                "three_star_count" => $this->reviews()->where('rating', 3)->count(),
                "two_star_count" => $this->reviews()->where('rating', 2)->count(),
                "one_star_count" => $this->reviews()->where('rating', 1)->count(),
            ],
            "product_images" => $this->images,
            "delivery_detail" => $this->deliveryDetail,
            "other_related_products" => $this->getRelatedProducts(),
            "dos_dont" => $this->doDont()->select('id', "product_id", "name")->get(),
            "design_application_details" => $this->designApplicationGuide,
            "storage_usage_details" => $this->storageUsage,
            "variables" => $this->variables()->select('variables_products.id', 'name', 'price', 'sale_price', 'discount', 'sku')->get(),
        ];
    }
}