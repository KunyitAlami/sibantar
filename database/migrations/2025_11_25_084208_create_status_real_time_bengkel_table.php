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
        Schema::create('status_real_time_bengkel', function (Blueprint $table) {
            $table->id('id_status_bengkel');
            $table->unsignedBigInteger('id_bengkel');
            $table->enum('status',['buka', 'tutup'])->default('buka');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_real_time_bengkel');
    }
};
