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
        Schema::create('vtex_sku_specifications_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vtex_response_id')->unique();
            $table->unsignedBigInteger('vtex_sku_id');            
            $table->unsignedBigInteger('vtex_specification_id');
            $table->unsignedBigInteger('vtex_specification_value_id');
            $table->timestamps();

            // TODO: Add foreign keys after confirming the referenced tables and columns exist
            // $table->foreign('vtex_sku_id')->references('vtex_sku_id')->on('vtex_exported_products')->onDelete('cascade');
            // $table->foreign('vtex_specification_id')->references('vtex_specification_id')->on('vtex_sku_specifications')->onDelete('cascade');
            // $table->foreign('vtex_specification_value_id')->references('vtex_specification_value_id')->on('vtex_sku_specifications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtex_sku_specifications_values');
    }
};
