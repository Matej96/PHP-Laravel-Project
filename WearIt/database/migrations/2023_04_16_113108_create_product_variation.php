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
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('color_id');
            $table->unsignedInteger('size_id');
            $table->unsignedInteger('quantity');
        });

        Schema::create('colors', function (Blueprint $table){
            $table->id();
            $table->string('color_name');
        });

        Schema::create('sizes', function (Blueprint $table){
            $table->id();
            $table->string('size_name');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('discount_id');
            $table->unsignedInteger('category_id')->nullable();
            $table->string('product_name');
            $table->string('product_description');
            $table->string('product_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variations,product_variations,colors,sizes');
    }
};
