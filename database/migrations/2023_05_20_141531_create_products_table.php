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
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('product_categories');
            $table->string('product_unicode')->unique();
            $table->integer('total_sizes');
            $table->integer('total_colors');
            $table->text('product_category');
            $table->string('product_feature');
            $table->string('product_image');
            $table->text('product_title');
            $table->integer('product_price');
            // $table->text('product_color');
            // $table->text('product_size');
            // $table->integer('product_quantity');
            $table->text('product_code')->unique();
            $table->text('product_description');
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
