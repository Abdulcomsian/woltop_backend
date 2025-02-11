<?php

namespace Database\Seeders;

use App\Models\DeliveryPreference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryPreferencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preferences = [
            ["name" => "Home", "time" => "9 AM to 9 PM Delivery"],
            ["name" => "Work", "time" => "9 AM to 5 PM Delivery"],
        ];

        foreach($preferences as $preference){
            DeliveryPreference::create($preference);
        }
    }
}
