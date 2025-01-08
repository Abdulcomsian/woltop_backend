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
            ["product_id" => 1, "city_details" => "DELHI, NCR, BANGALORE", "days" => "2-3 Days after shipping"],
            ["product_id" => 1, "city_details" => "PAN INDIA", "days" => "4-5 Days after shipping"],
            ["product_id" => 2, "city_details" => "DELHI, NCR, BANGALORE", "days" => "2-3 Days after shipping"],
            ["product_id" => 2, "city_details" => "PAN INDIA", "days" => "4-5 Days after shipping"],
            ["product_id" => 3, "city_details" => "DELHI, NCR, BANGALORE", "days" => "2-3 Days after shipping"],
            ["product_id" => 3, "city_details" => "PAN INDIA", "days" => "4-5 Days after shipping"],
            ["product_id" => 4, "city_details" => "DELHI, NCR, BANGALORE", "days" => "2-3 Days after shipping"],
            ["product_id" => 4, "city_details" => "PAN INDIA", "days" => "4-5 Days after shipping"],
            ["product_id" => 5, "city_details" => "DELHI, NCR, BANGALORE", "days" => "2-3 Days after shipping"],
            ["product_id" => 5, "city_details" => "PAN INDIA", "days" => "4-5 Days after shipping"],
            ["product_id" => 6, "city_details" => "DELHI, NCR, BANGALORE", "days" => "2-3 Days after shipping"],
            ["product_id" => 6, "city_details" => "PAN INDIA", "days" => "4-5 Days after shipping"],
            ["product_id" => 7, "city_details" => "DELHI, NCR, BANGALORE", "days" => "2-3 Days after shipping"],
            ["product_id" => 7, "city_details" => "PAN INDIA", "days" => "4-5 Days after shipping"],
            ["product_id" => 8, "city_details" => "DELHI, NCR, BANGALORE", "days" => "2-3 Days after shipping"],
            ["product_id" => 8, "city_details" => "PAN INDIA", "days" => "4-5 Days after shipping"],
        ];

        foreach($delivery_details as $detail){
            DeliveryDetail::create($detail);
        }
    }
}
