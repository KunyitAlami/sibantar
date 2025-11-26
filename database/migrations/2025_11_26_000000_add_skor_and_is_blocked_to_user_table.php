<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Table name in this project appears to be `user`
        if (!Schema::hasTable('user')) {
            return;
        }

        if (!Schema::hasColumn('user', 'skor')) {
            Schema::table('user', function (Blueprint $table) {
                $table->integer('skor')->default(0)->after('wa_number');
            });
        }

        if (!Schema::hasColumn('user', 'is_blocked')) {
            Schema::table('user', function (Blueprint $table) {
                $table->boolean('is_blocked')->default(false)->after('skor');
            });
        }
    }

    public function down()
    {
        if (!Schema::hasTable('user')) {
            return;
        }

        Schema::table('user', function (Blueprint $table) {
            if (Schema::hasColumn('user', 'is_blocked')) {
                $table->dropColumn('is_blocked');
            }
            if (Schema::hasColumn('user', 'skor')) {
                $table->dropColumn('skor');
            }
        });
    }
};
