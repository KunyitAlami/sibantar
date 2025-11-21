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
        Schema::create('bengkel_status', function (Blueprint $table) {
            $table->id('id_status');
            $table->unsignedBigInteger('id_bengkel');
            $table->enum('status', ['buka', 'tutup'])->default('buka');
            $table->timestamps();

            $table->foreign('id_bengkel')->references('id_bengkel')->on('bengkel')->cascade();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bengkel_status');
    }
};
