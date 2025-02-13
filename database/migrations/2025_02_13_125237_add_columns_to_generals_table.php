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
        Schema::table('generals', function (Blueprint $table) {
            $table->string("installation_charges")->nullable();
            $table->string("cash_on_delivery_charges")->nullable();
            $table->string("shipping_charges")->nullable();
            $table->string("threshold_charges")->nullable();
            $table->string("unit")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('generals', function (Blueprint $table) {
            //
        });
    }
};
