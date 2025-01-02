<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PDO;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ["name" => "3D Wallpaper", "parent_category_id" => 1 , "image" => "popular.png"],
            ["name" => "Living Room", "parent_category_id" => 2 , "image" => "popular.png"],
            ["name" => "Bedroom", "parent_category_id" => 2 , "image" => "popular.png"],
            ["name" => "Office", "parent_category_id" => 2, "image" => "popular.png"],
            ["name" => "Kids Room", "parent_category_id" => 2 , "image" => "popular.png"],
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
