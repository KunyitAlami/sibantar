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
        Schema::create('report_from_user', function (Blueprint $table) {
            $table->id('id_report_from_user');
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_bengkel');
            $table->unsignedBigInteger('id_user');
            $table->text('deskripsi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_from_user');
    }
};
