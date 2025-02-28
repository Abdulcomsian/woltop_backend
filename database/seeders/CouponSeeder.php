<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\CouponUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        CouponUser::truncate();
        Coupon::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $coupons = [
            "name" => "MDT0123",
            "short_description" => "Get additional 20% off with this code",
            "long_description" => "<ul><li>Offer applicable on entire order</li><li>Offer applicable for first time customer only</li><li>Other T&amp;C may apply</li><li>Offer valid till March 01, 2025</li></ul>",
            "type" => "percentage",
            "price" => "20",
            "is_countable" => false,
            "counting" => null,
            "start_date" => "2025-02-25 18:21:59",
            "end_date" => "2026-03-29 06:21:40",
            "status" => "active"
        ];

        Coupon::create($coupons);
    }
}
