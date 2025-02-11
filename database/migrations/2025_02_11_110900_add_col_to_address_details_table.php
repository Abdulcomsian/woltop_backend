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
        Schema::table('address_details', function (Blueprint $table) {
            $table->unsignedBigInteger("delivery_preference_id")->after('landmark');
            $table->foreign("delivery_preference_id")->on("deliveries_preferences")->references("id");
            $table->dropColumn("delivery_preference");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('address_details', function (Blueprint $table) {
            //
        });
    }
};
