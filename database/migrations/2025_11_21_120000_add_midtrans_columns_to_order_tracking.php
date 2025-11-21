<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_tracking', function (Blueprint $table) {
            if (!Schema::hasColumn('order_tracking', 'midtrans_order_id')) {
                $table->string('midtrans_order_id')->nullable()->after('finalPrice');
            }

            if (!Schema::hasColumn('order_tracking', 'midtrans_status')) {
                $table->string('midtrans_status')->nullable()->after('midtrans_order_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_tracking', function (Blueprint $table) {
            if (Schema::hasColumn('order_tracking', 'midtrans_status')) {
                $table->dropColumn('midtrans_status');
            }

            if (Schema::hasColumn('order_tracking', 'midtrans_order_id')) {
                $table->dropColumn('midtrans_order_id');
            }
        });
    }
};
