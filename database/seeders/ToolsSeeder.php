<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            ["name" => "Wolpin Wallpaper Non-woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "this is the test description","image" => "tool.png" ,"price" => 123, "sale_price" => 234],
            ["name" => "Wolpin Wallpaper Non-woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "this is the test description","image" => "tool.png" ,"price" => 123, "sale_price" => 234],
            ["name" => "Wolpin Wallpaper Non-woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "this is the test description","image" => "tool.png" ,"price" => 123, "sale_price" => 234],
            ["name" => "Wolpin Wallpaper Non-woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "this is the test description","image" => "tool.png" ,"price" => 123, "sale_price" => 234],
        ];

        foreach($tools as $tool){
            Tool::create($tool);
        }
    }
}
