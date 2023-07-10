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
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number');
            $table->text('product_code');
            $table->text('product_title');
            $table->text('product_size');
            $table->text('product_color');
            $table->text('product_quantity');
            $table->text('product_price');
            $table->text('product_category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};
