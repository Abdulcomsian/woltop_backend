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
        Schema::create('installation_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->string("name")->nullable();
            $table->longText("description")->nullable();
            $table->string("image")->nullable();
            $table->foreign("product_id")->on("products")->references("id");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installation_steps');
    }
};
