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
            ["attribute_id" => 1, "name" => "53CM x 6M"],
            ["attribute_id" => 1, "name" => "53CM x 9.5M"]
        ];

        foreach($attribute_value_data as $attr){
            AttributeValue::create($attr);
        }
    }
}
