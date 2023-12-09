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
            $table->string('order_id');
            $table->date('order_date')->nullable();
            $table->integer('invoice_id');
            $table->integer('sub_total');
            $table->integer('shipping_cost')->nullable();
            $table->integer('discount')->default(0);
            $table->integer('total');
            $table->integer('courier_id');
            $table->integer('city_id');
            $table->integer('courier_zone_id');
            $table->string('order_note')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
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
