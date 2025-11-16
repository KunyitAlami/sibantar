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
        Schema::create('layanan_bengkel', function (Blueprint $table) {
            $table->id('id_layanan_bengkel');
            $table->unsignedBigInteger('id_bengkel');
            $table->string('nama_layanan');
            $table->text('deskripsi');
            $table->string('harga_awal');
            $table->string('harga_akhir');
            $table->string('estimasi_harga')->virtualAs("CONCAT(harga_awal, ' - ', harga_akhir)");
            $table->string('kategori');
            $table->timestamps();

            $table->foreign('id_bengkel')->references('id_bengkel')->on('bengkel')->cascade();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_bengkel');
    }
};
