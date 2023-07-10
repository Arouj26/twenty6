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
        Schema::create('qties', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');

            $table->string('product_title');
            $table->string('product_price');
            $table->string('product_size');
            $table->string('product_color');
            $table->string('product_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qties');
    }
};
