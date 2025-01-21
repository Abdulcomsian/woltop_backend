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
        Schema::create('address_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->string("name")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("pincode")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("address")->nullable();
            $table->string("locality")->nullable();
            $table->string("landmark")->nullable();
            $table->enum("delivery_preference", ['home', 'work'])->nullable();
            $table->foreign("user_id")->on("users")->references("id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_details');
    }
};
