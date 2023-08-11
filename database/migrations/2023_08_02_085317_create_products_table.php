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
            $table->string('title');
            $table->string('sort_desp');
            $table->longText('long_desp');
            $table->integer('status')->default(1);
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->integer('total_price');
            $table->string('thumbnail')->nullable();
            $table->string('slug');
            $table->string('meta_title');
            $table->string('meta_desp');
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
