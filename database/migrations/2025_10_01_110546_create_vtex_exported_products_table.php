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
        Schema::create('vtex_exported_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internal_product_id')->constrained('products')->cascadeOnDelete();
            $table->string('internal_product_number');
            $table->unsignedBigInteger('vtex_product_id');
            $table->unsignedBigInteger('vtex_sku_id')->nullable();
            $table->timestamps();

            $table->foreign('internal_product_number')
                ->references('sku')
                ->on('products')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtex_exported_products');
    }
};
