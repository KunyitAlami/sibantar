<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('count_down', function (Blueprint $table) {
            $table->id('id_count_down');
            $table->unsignedBigInteger('id_order');
            $table->enum('status', ['pending', 'terkonfirmasi', 'tidak_dikonfirmasi'])->default('pending');
            $table->timestamps();
            $table->timestamp('batas_konfirmasi')->nullable();
            $table->foreign('id_order')->references('id_order')->on('order')->cascade();
        });

        DB::unprepared("
            CREATE TRIGGER set_batas_konfirmasi BEFORE INSERT ON count_down
            FOR EACH ROW
            BEGIN
                SET NEW.batas_konfirmasi = DATE_ADD(NOW(), INTERVAL 2 MINUTE);
            END
        ");



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('count_down');
    }
};
