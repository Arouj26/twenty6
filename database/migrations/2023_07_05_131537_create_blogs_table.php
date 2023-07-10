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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('blog_title');
            $table->string('blog_picture');
            $table->text('blog_tag');
            $table->text('blog_author');
            $table->date('blog_date');
            $table->text('blog_p1');
            $table->text('blog_p2')->nullable();
            $table->text('blog_p3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
