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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->dateTime('open');
            $table->dateTime('close');
            $table->unsignedBigInteger('places_id');
            $table->unsignedBigInteger('order_states_id');
            $table->timestamps();
            $table->index('places_id', 'orders_places_idx');
            $table->index('order_states_id', 'places_order_states_id');
            $table->foreign('places_id', 'order_places_fk')->references('id')->on('places');
            $table->foreign('order_states_id', 'orders_order_states_fk')->references('id')->on('order_states');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
