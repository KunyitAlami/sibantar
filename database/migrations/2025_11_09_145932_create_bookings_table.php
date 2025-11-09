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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bengkel_id');
            $table->enum('vehicle_type', ['Motor', 'Mobil', 'Truk']);
            $table->string('problem_type');
            $table->enum('status', ['pending', 'accepted', 'rejected', 'on_progress', 'completed', 'cancelled'])->default('pending');
            $table->integer('estimated_price_min')->nullable();
            $table->integer('estimated_price_max')->nullable();
            $table->integer('final_price')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            
            // Foreign keys - sesuaikan dengan primary key backend
            $table->foreign('user_id')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('bengkel_id')->references('id_bengkel')->on('bengkel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
