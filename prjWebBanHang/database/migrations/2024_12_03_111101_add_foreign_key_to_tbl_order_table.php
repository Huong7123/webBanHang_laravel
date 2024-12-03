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
        Schema::table('tbl_order', function (Blueprint $table) {
            $table->foreign('customer_id')->references('customer_id')->on('tbl_customers');
            $table->foreign('shipping_id')->references('shipping_id')->on('tbl_shipping');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_order', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['shipping_id']);
        });
    }
};
