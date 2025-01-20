<?php

namespace Database\Seeders;

use App\Models\ProductFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ids = [1,2,3,4,5,6,7,8];
        $features = [];

        foreach($ids as $id){
            $features[] = [
                ['product_id' => $id, "name" => "Textured", "image" => "textured.png"],
                ['product_id' => $id, "name" => "Desing Protected", "image" => "design_protected.png"],
                ['product_id' => $id, "name" => "Washable", "image" => "washable.png"],
                ['product_id' => $id, "name" => "Modern Design", "image" => "modern_design.png"],
            ];
        }

        // Flatten the array before saving
        $flatFeatures = array_merge(...$features); 

        foreach($flatFeatures as $feature){
            ProductFeature::create($feature);
        }
    }
}
