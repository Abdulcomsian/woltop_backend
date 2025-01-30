<?php

namespace Database\Seeders;

use App\Models\DeliveryDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $delivery_details = [
            ["city_details" => "DELHI, NCR, BANGALORE", "days" => "2-3 Days after shipping"],
            ["city_details" => "PAN INDIA", "days" => "4-5 Days after shipping"],
        ];

        foreach($delivery_details as $detail){
            DeliveryDetail::create($detail);
        }
    }
}
