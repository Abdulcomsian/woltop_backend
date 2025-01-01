<?php

namespace Database\Seeders;

use App\Models\ParentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parent_categories = [
            ['name' => "None"],
            ['name' => "Rooms"],
        ];

        foreach($parent_categories as $categories){
            ParentCategory::create($categories);
        }
    }
}
