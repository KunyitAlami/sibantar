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
        Schema::create('order_tracking', function (Blueprint $table) {
            $table->id('id_order_tracking');
            $table->unsignedBigInteger('id_order');
            $table->integer('current_step');
            $table->text('finalPrice')->nullable();
            $table->timestamps();

            $table->foreign('id_order')->references('id_order')->on('order')->cascade();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_tracking');
    }
};
