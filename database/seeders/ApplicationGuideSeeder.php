<?php

namespace Database\Seeders;

use App\Models\ApplicationGuide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['product_id' => 1, "room_type" => "Suitable for all: Living room, bedroom, office arid more.", "finish_type" => "Textured with shine and glitter", "pattern_repeat" => "64 cm", "pattern_match" => "Offset Match", "application_guide" => "Can be hanged using standard wallpaper glue adhesive."],
            ['product_id' => 2, "room_type" => "Suitable for all: Living room, bedroom, office arid more.", "finish_type" => "Textured with shine and glitter", "pattern_repeat" => "64 cm", "pattern_match" => "Offset Match", "application_guide" => "Can be hanged using standard wallpaper glue adhesive."],
            ['product_id' => 3, "room_type" => "Suitable for all: Living room, bedroom, office arid more.", "finish_type" => "Textured with shine and glitter", "pattern_repeat" => "64 cm", "pattern_match" => "Offset Match", "application_guide" => "Can be hanged using standard wallpaper glue adhesive."],
            ['product_id' => 4, "room_type" => "Suitable for all: Living room, bedroom, office arid more.", "finish_type" => "Textured with shine and glitter", "pattern_repeat" => "64 cm", "pattern_match" => "Offset Match", "application_guide" => "Can be hanged using standard wallpaper glue adhesive."],
            ['product_id' => 5, "room_type" => "Suitable for all: Living room, bedroom, office arid more.", "finish_type" => "Textured with shine and glitter", "pattern_repeat" => "64 cm", "pattern_match" => "Offset Match", "application_guide" => "Can be hanged using standard wallpaper glue adhesive."],
            ['product_id' => 6, "room_type" => "Suitable for all: Living room, bedroom, office arid more.", "finish_type" => "Textured with shine and glitter", "pattern_repeat" => "64 cm", "pattern_match" => "Offset Match", "application_guide" => "Can be hanged using standard wallpaper glue adhesive."],
            ['product_id' => 7, "room_type" => "Suitable for all: Living room, bedroom, office arid more.", "finish_type" => "Textured with shine and glitter", "pattern_repeat" => "64 cm", "pattern_match" => "Offset Match", "application_guide" => "Can be hanged using standard wallpaper glue adhesive."],
            ['product_id' => 8, "room_type" => "Suitable for all: Living room, bedroom, office arid more.", "finish_type" => "Textured with shine and glitter", "pattern_repeat" => "64 cm", "pattern_match" => "Offset Match", "application_guide" => "Can be hanged using standard wallpaper glue adhesive."],
        ];

        foreach($data as $d){
            ApplicationGuide::create($d);
        }
    }
}
