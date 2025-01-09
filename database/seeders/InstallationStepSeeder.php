<?php

namespace Database\Seeders;

use App\Models\InstallationStep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstallationStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $steps = [
            ["product_id" => 1, "name" => "Step 1", "description" => "Measure and cut the wallpaper to the required length", "image" => "step1.png"],
            ["product_id" => 1, "name" => "Step 2", "description" => "Apply wallpaper paste to the back of the wallpaper", "image" => "step2.png"],
            ["product_id" => 1, "name" => "Step 3", "description" => "Your order is then manufactured and dispatched within 48 hours of your design proof approval.", "image" => "step3.png"],
            ["product_id" => 1, "name" => "Step 4", "description" => "Easily get your wallpaper installed with our wide installation network covering 100+ cities.", "image" => "step4.png"],

            ["product_id" => 2, "name" => "Step 1", "description" => "Measure and cut the wallpaper to the required length", "image" => "step1.png"],
            ["product_id" => 2, "name" => "Step 2", "description" => "Apply wallpaper paste to the back of the wallpaper", "image" => "step2.png"],
            ["product_id" => 2, "name" => "Step 3", "description" => "Your order is then manufactured and dispatched within 48 hours of your design proof approval.", "image" => "step3.png"],
            ["product_id" => 2, "name" => "Step 4", "description" => "Easily get your wallpaper installed with our wide installation network covering 100+ cities.", "image" => "step4.png"],

            ["product_id" => 3, "name" => "Step 1", "description" => "Measure and cut the wallpaper to the required length", "image" => "step1.png"],
            ["product_id" => 3, "name" => "Step 2", "description" => "Apply wallpaper paste to the back of the wallpaper", "image" => "step2.png"],
            ["product_id" => 3, "name" => "Step 3", "description" => "Your order is then manufactured and dispatched within 48 hours of your design proof approval.", "image" => "step3.png"],
            ["product_id" => 3, "name" => "Step 4", "description" => "Easily get your wallpaper installed with our wide installation network covering 100+ cities.", "image" => "step4.png"],

            ["product_id" => 4, "name" => "Step 1", "description" => "Measure and cut the wallpaper to the required length", "image" => "step1.png"],
            ["product_id" => 4, "name" => "Step 2", "description" => "Apply wallpaper paste to the back of the wallpaper", "image" => "step2.png"],
            ["product_id" => 4, "name" => "Step 3", "description" => "Your order is then manufactured and dispatched within 48 hours of your design proof approval.", "image" => "step3.png"],
            ["product_id" => 4, "name" => "Step 4", "description" => "Easily get your wallpaper installed with our wide installation network covering 100+ cities.", "image" => "step4.png"],

            ["product_id" => 5, "name" => "Step 1", "description" => "Measure and cut the wallpaper to the required length", "image" => "step1.png"],
            ["product_id" => 5, "name" => "Step 2", "description" => "Apply wallpaper paste to the back of the wallpaper", "image" => "step2.png"],
            ["product_id" => 5, "name" => "Step 3", "description" => "Your order is then manufactured and dispatched within 48 hours of your design proof approval.", "image" => "step3.png"],
            ["product_id" => 5, "name" => "Step 4", "description" => "Easily get your wallpaper installed with our wide installation network covering 100+ cities.", "image" => "step4.png"],

            ["product_id" => 6, "name" => "Step 1", "description" => "Measure and cut the wallpaper to the required length", "image" => "step1.png"],
            ["product_id" => 6, "name" => "Step 2", "description" => "Apply wallpaper paste to the back of the wallpaper", "image" => "step2.png"],
            ["product_id" => 6, "name" => "Step 3", "description" => "Your order is then manufactured and dispatched within 48 hours of your design proof approval.", "image" => "step3.png"],
            ["product_id" => 6, "name" => "Step 4", "description" => "Easily get your wallpaper installed with our wide installation network covering 100+ cities.", "image" => "step4.png"],

            ["product_id" => 7, "name" => "Step 1", "description" => "Measure and cut the wallpaper to the required length", "image" => "step1.png"],
            ["product_id" => 7, "name" => "Step 2", "description" => "Apply wallpaper paste to the back of the wallpaper", "image" => "step2.png"],
            ["product_id" => 7, "name" => "Step 3", "description" => "Your order is then manufactured and dispatched within 48 hours of your design proof approval.", "image" => "step3.png"],
            ["product_id" => 7, "name" => "Step 4", "description" => "Easily get your wallpaper installed with our wide installation network covering 100+ cities.", "image" => "step4.png"],

            ["product_id" => 8, "name" => "Step 1", "description" => "Measure and cut the wallpaper to the required length", "image" => "step1.png"],
            ["product_id" => 8, "name" => "Step 2", "description" => "Apply wallpaper paste to the back of the wallpaper", "image" => "step2.png"],
            ["product_id" => 8, "name" => "Step 3", "description" => "Your order is then manufactured and dispatched within 48 hours of your design proof approval.", "image" => "step3.png"],
            ["product_id" => 8, "name" => "Step 4", "description" => "Easily get your wallpaper installed with our wide installation network covering 100+ cities.", "image" => "step4.png"],
        ];

        foreach($steps as $step){
            InstallationStep::create($step);
        }
    }
}
