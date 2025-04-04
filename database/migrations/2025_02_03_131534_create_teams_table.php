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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("image")->nullable();
            $table->string("designation")->nullable();
            $table->longText("bio")->nullable();
            $table->string("portfolio_website")->nullable();
            $table->string("linkedIn_profile")->nullable();
            $table->string("facebook_profile")->nullable();
            $table->string("x_profile")->nullable();
            $table->string("youtube_profile")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
