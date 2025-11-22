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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('id_rating');
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_bengkel');
            $table->integer('ratingBengkel');
            $table->integer('ratingLayanan');
            $table->text('comment')->nullable();
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('id_order')->references('id_order')->on('order')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('id_bengkel')->references('id_bengkel')->on('bengkel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
