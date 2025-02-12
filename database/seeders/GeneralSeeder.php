<?php

namespace Database\Seeders;

use App\Models\General;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generals = [
            ["name" => "Luxe Designs", "main_image" => "banner.png", "image" => "logo.png","link" => "https://web.wolpin.in/", "type" => "home_banner"],
            ["link" => "video.mov", "type" => "home_video"],
        ];

        General::truncate();
        foreach($generals as $general){
            General::create($general);
        }
    }
}
