<?php

namespace Database\Seeders;

use App\Models\StorageUsage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data  = [
            ["product_id" => 1, "storage" => "Keep in a dry, well-ventilated area, store away from moisture", "net_weight" => "1200 g", "coverage" => "Usually 3 rolls are sufficient for one  standard wall"],
            ["product_id" => 2, "storage" => "Keep in a dry, well-ventilated area, store away from moisture", "net_weight" => "1200 g", "coverage" => "Usually 3 rolls are sufficient for one  standard wall"],
            ["product_id" => 3, "storage" => "Keep in a dry, well-ventilated area, store away from moisture", "net_weight" => "1200 g", "coverage" => "Usually 3 rolls are sufficient for one  standard wall"],
            ["product_id" => 4, "storage" => "Keep in a dry, well-ventilated area, store away from moisture", "net_weight" => "1200 g", "coverage" => "Usually 3 rolls are sufficient for one  standard wall"],
            ["product_id" => 5, "storage" => "Keep in a dry, well-ventilated area, store away from moisture", "net_weight" => "1200 g", "coverage" => "Usually 3 rolls are sufficient for one  standard wall"],
            ["product_id" => 6, "storage" => "Keep in a dry, well-ventilated area, store away from moisture", "net_weight" => "1200 g", "coverage" => "Usually 3 rolls are sufficient for one  standard wall"],
        ];

        foreach($data as $d){
            StorageUsage::create($d);
        }
    }
}
