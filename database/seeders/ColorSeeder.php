<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => "Neutrals"],
            ['name' => "Pink"],
            ['name' => "Blue"],
            ['name' => "Green"],
            ['name' => "Golden"],
        ];

        foreach($colors as $color){
            Color::create($color);
        }
    }
}
