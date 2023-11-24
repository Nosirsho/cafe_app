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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('place_categories_id');
            $table->unsignedBigInteger('place_states_id');
            $table->timestamps();
            $table->foreign('place_categories_id', 'places_place_ctgr_fk')->references('id')->on('place_categories');
            $table->foreign('place_states_id', 'places_place_state_fk')->references('id')->on('place_states');
            $table->index('place_categories_id', 'places_place_ctgr_idx');
            $table->index('place_states_id', 'places_place_state_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
