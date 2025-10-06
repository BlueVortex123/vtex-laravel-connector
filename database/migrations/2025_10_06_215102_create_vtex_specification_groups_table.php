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
        Schema::create('vtex_specification_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('vtex_category_id');
            $table->string('vtex_specification_group_name', 20);
            $table->unsignedBigInteger('vtex_specification_group_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtex_specification_groups');
    }
};
