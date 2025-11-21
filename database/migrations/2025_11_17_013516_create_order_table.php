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
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_order');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_bengkel');
            $table->unsignedBigInteger('id_layanan_bengkel');
            $table->text('user_latitude');
            $table->text('user_longitude');
            $table->text('bengkel_latitude');
            $table->text('bengkel_longitude');
            $table->enum('status', ['menunggu_konfirmasi', 'pending', 'dibayar', 'diproses', 'selesai', 'ditolak', 'dibatalkan'])->default('menunggu_konfirmasi');
            $table->string('estimasi_harga');
            $table->text('total_bayar')->nullable();
            $table->text('notes')->nullable();
            $table->string('client_timezone', 50)->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('user')->cascade();
            $table->foreign('id_bengkel')->references('id_bengkel')->on('bengkel')->cascade();
            $table->foreign('id_layanan_bengkel')->references('id_layanan_bengkel')->on('layanan_bengkel')->cascade();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
