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
            ["name" => "Luxe Designs", "main_image" => "banner.png", "image" => "logo.png", "type" => "home_banner"],
        ];

        foreach($generals as $general){
            General::create($general);
        }
    }
}
