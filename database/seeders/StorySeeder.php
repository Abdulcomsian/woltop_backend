<?php

namespace Database\Seeders;

use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = [
            ["path" => "default.mov"],
            ["path" => "default.mov"],
            ["path" => "default.mov"],
            ["path" => "default.mov"],
            ["path" => "default.mov"],
        ];

        foreach($stories as $story){
            Story::create($story);
        }
    }
}
