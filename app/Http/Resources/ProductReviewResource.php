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
            "video" => asset("assets/wolpin_media/products/video/default.mov"),
            "featured_image" => asset('assets/wolpin_media/products/featured_images/' . $this->featured_image),
            "product_type" => $this->product_type,
            "reviews" => [
                "total_count" => $this->reviews->count(),
                "average" => $this->reviews->count() > 0 ? round($this->reviews->avg('rating'), 2) : 0,
                "five_star_count" => $this->reviews()->where('rating', 5)->count(),
                "four_star_count" => $this->reviews()->where('rating', 4)->count(),
                "three_star_count" => $this->reviews()->where('rating', 3)->count(),
                "two_star_count" => $this->reviews()->where('rating', 2)->count(),
                "one_star_count" => $this->reviews()->where('rating', 1)->count(),
            ],
            "product_images" => $this->images->map(function($data){
                return [
                    "id" => $data->id,
                    "product_id" => $data->product_id,
                    "image_path" => asset("assets/wolpin_media/products/gallery_images/" . $data->image_path),
                ];
            }),
            "other_related_products" => $this->getRelatedProducts(),
            "dos_dont" => $this->doDont()->select('id', "product_id", "name")->get(),
            "design_application_details" => [$this->designApplicationGuide],
            "storage_usage_details" => [$this->storageUsage],
            "variables" => $this->variables->map(function($item){
                return [
                    "id" => $item->id,
                    "title" => $item->title,
                    "price" => $item->price,
                    "sale_price" => $item->sale_price,
                    "discount" => $item->discount,
                    "options" => collect(json_decode($item->options, true))->mapWithKeys(function ($option) {
                        return [$option['name'] => $option['value']];
                    }),
                ];
            }),
            "installation_steps" => $this->installationSteps->map(function($step){
                return [
                    "id" => $step->id,
                    "name" => $step->name,
                    "description" => $step->description,
                    "image" => asset("assets/wolpin_media/installation_steps/" . $step->image),
                ];
            }),
            "products_features" => $this->productsFeatures->map(function($feature){
                return [
                    "id" => $feature->id,
                    "name" => $feature->name,
                    "image" => asset("assets/wolpin_media/products/features/" . $feature->image),
                ];
            }),
            "toolkit" => $this->getToolkit(),
        ];
    }
}