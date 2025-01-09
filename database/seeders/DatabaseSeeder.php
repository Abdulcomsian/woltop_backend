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
            AttributeSeeder::class,
            ProductSeeder::class,
            ToolsSeeder::class,
            DeliveryDetailSeeder::class,
            DoSeeder::class,
            ApplicationGuideSeeder::class,
            StorageUsageSeeder::class,
            InstallationStepSeeder::class,
            TeamSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
