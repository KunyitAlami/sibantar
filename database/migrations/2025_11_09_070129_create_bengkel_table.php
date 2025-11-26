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
        Schema::create('bengkel', function (Blueprint $table) {
            $table->id('id_bengkel');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('link_gmaps');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('nama_bengkel');
            $table->string('kecamatan');
            $table->text('alamat_lengkap')->nullable();
            $table->string('jam_buka');
            $table->string('jam_tutup');
            $table->string('jam_operasional');
            $table->enum('status', ['aktif', 'belum_aktif'])->default('belum_aktif');
            $table->timestamps();

            // korelasi
            $table->foreign('id_user')->references('id_user')->on('user')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bengkel');
    }
};
