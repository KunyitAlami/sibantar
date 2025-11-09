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
        Schema::create('final_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->integer('service_price');
            $table->integer('delivery_fee')->default(0);
            $table->integer('night_fee')->default(0);
            $table->integer('total');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Foreign key
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_prices');
    }
};
