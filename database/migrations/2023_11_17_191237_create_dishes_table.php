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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('price');
            $table->unsignedBigInteger('measurement_units_id');
            $table->unsignedBigInteger('dish_categories_id');
            $table->string('description')->nullable();

            $table->timestamps();

            $table->index('measurement_units_id', 'dishes_meas_units_idx');
            $table->index('dish_categories_id', 'dishes_dish_ctgr_idx');
            $table->foreign('measurement_units_id', 'dishes_meas_units_fk')->references('id')->on('measurement_units');
            $table->foreign('dish_categories_id', 'dishes_dish_ctgr_fk')->references('id')->on('dish_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
