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
        Schema::create('user_role_map', function (Blueprint $table) {
            $table->id('id_user_role_map');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_user_role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role_map');
    }
};
