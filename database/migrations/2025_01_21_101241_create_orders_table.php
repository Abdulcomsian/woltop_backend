<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("address_id");
            $table->string("total_mrp")->nullable();
            $table->string("cart_discount")->nullable();
            $table->string("shipping_charges")->nullable();
            $table->string("total_amount")->nullable();
            $table->enum("payment_status", ["pending", "paid", "unpaid"])->default("pending");
            $table->enum("order_status", ["pending", "delivered", "cancelled"])->default("pending");
            $table->foreign("address_id")->on("address_details")->references("id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
