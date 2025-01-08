<?php

namespace Database\Seeders;

use App\Models\DosDont;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["product_id" => 1, "name" => "Clean the wall surface before installation."],
            ["product_id" => 1, "name" => "Don’t apply on uneven & textured walls."],
            ["product_id" => 1, "name" => "Don’t Expose the excessive moisture."],

            ["product_id" => 2, "name" => "Clean the wall surface before installation."],
            ["product_id" => 2, "name" => "Don’t apply on uneven & textured walls."],
            ["product_id" => 2, "name" => "Don’t Expose the excessive moisture."],

            ["product_id" => 3, "name" => "Clean the wall surface before installation."],
            ["product_id" => 3, "name" => "Don’t apply on uneven & textured walls."],
            ["product_id" => 3, "name" => "Don’t Expose the excessive moisture."],

            ["product_id" => 4, "name" => "Clean the wall surface before installation."],
            ["product_id" => 4, "name" => "Don’t apply on uneven & textured walls."],
            ["product_id" => 4, "name" => "Don’t Expose the excessive moisture."],
        ];

        foreach($data as $d){
            DosDont::create($d);
        }
    }
}
