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
        Schema::create('dish_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dishes_id');
            $table->unsignedBigInteger('orders_id');
            $table->integer('count');
            $table->unsignedBigInteger('dish_order_states_id');
            $table->timestamps();
            $table->index('dishes_id', 'dish_orders_dishes_idx');
            $table->index('orders_id', 'dish_orders_orders_idx');
            $table->index('dish_order_states_id', 'dish_orders_dish_order_states_idx');
            $table->foreign('dishes_id', 'dish_orders_dishes_fk')->references('id')->on('dishes');
            $table->foreign('orders_id', 'dish_orders_orders_fk')->references('id')->on('orders');
            $table->foreign('dish_order_states_id', 'dish_orders_dish_order_states_fk')->references('id')->on('dishes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_orders');
    }
};
