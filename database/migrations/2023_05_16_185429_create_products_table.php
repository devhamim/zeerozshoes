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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('category_id');
            $table->integer('product_price');
            $table->integer('product_discount')->nullable();
            $table->integer('after_discount');
            $table->integer('brand')->nullable();
            $table->integer('status');
            $table->integer('sku')->nullable();
            $table->text('preview_image')->nullable();
            $table->text('slug')->nullable();
            $table->date('validity')->nullable();
            $table->integer('campaign');
            $table->longText('description');
            $table->integer('added_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
