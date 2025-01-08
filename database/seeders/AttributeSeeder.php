<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["name" => "size"],
        ];

        foreach($data as $d){
            Attribute::create($d);
        }

        $attribute_value_data = [
            ["attribute_id" => 1, "name" => "53CM x 6M", "price" => 1630, "sale_price" => 799, "discount" => 49, "sku" => "134qwe"],
            ["attribute_id" => 1, "name" => "53CM x 9.5M", "price" => 462, "sale_price" => 1149, "discount" => 51, "sku" => "2345wwr"]
        ];

        foreach($attribute_value_data as $attr){
            AttributeValue::create($attr);
        }
    }
}
