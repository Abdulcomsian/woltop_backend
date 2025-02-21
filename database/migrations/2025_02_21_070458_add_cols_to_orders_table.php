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
        Schema::table('orders', function (Blueprint $table) {
            $table->after("shipping_charges", function($table){
                $table->boolean("need_installation_service")->default(false);
                $table->integer("installation_charges")->nullable();
                $table->string("price_unit")->default("INR");
                $table->unsignedBigInteger("toolkit_id")->nullable();
                $table->foreign("toolkit_id")->on("products")->references("id");
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
