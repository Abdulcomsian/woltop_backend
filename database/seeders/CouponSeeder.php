<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = [
            "name" => "MDT0123",
            "type" => "percentage",
            "price" => "5",
            "is_countable" => false,
            "counting" => null,
            "start_date" => "2025-02-25 18:21:59",
            "end_date" => "2026-03-29 06:21:40",
            "status" => "active"
        ];

        Coupon::create($coupons);
    }
}
