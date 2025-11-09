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
        Schema::create('calon_bengkel', function (Blueprint $table) {
            $table->id('id_calon_bengkel');
            $table->string('username');
            $table->string('role')->default('bengkel');
            $table->string('email');
            $table->string('password');
            $table->string('wa_number');
            $table->string('link_gmaps');
            $table->string('nama_bengkel');
            $table->string('kecamatan');
            $table->text('alamat_lengkap')->nullable();
            $table->string('jam_buka');
            $table->string('jam_tutup');
            $table->string('jam_operasional')->nullable();
            $table->text('penjelasan_bengkel');
            $table->enum('status', ['diterima', 'belum_diterima'])->default('belum_diterima');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_bengkel');
    }
};
