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
        Schema::create('vtex_sku_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vtex_specification_group_id')->constrained('vtex_specification_groups')->cascadeOnDelete();
            $table->string('vtex_specification_name', 20);
            $table->unsignedBigInteger('vtex_specification_id');
            $table->string('vtex_specification_value_name', 20)->nullable();
            $table->unsignedBigInteger('vtex_specification_value_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtex_sku_specifications');
    }
};
