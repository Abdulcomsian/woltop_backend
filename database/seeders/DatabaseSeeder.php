<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            ParentCategorySeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            StorySeeder::class,
            ColorSeeder::class,
            ProductSeeder::class,
            ToolsSeeder::class,
        ]);
    }
}
