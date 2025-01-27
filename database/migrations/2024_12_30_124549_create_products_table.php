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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("color_id")->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string("video")->nullable();
            $table->string('price')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('sku')->unique()->nullable();
            $table->string('featured_image')->nullable();
            $table->enum('product_type', ['simple', 'variable'])->default('simple');
            $table->enum('status', ['draft', 'publish'])->default('draft');
            $table->string("meta_title")->nullable();
            $table->longText("meta_description")->nullable();
            $table->foreign('color_id')->on("colors")->references("id");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
