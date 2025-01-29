<?php

namespace Database\Seeders;

use App\Models\Reel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reels = [
            ["path" => "default.mov"],
            ["path" => "default.mov"],
            ["path" => "default.mov"],
            ["path" => "default.mov"],
            ["path" => "default.mov"],
        ];

        foreach($reels as $reel){
            Reel::create($reel);
        }
    }
}
