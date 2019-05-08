<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartSessionVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_cart_session_voucher', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cart_session_id');
            $table->foreign('cart_session_id')->references('id')->on('ls_cart_sessions')->onDelete('cascade');
            $table->unsignedBigInteger('voucher_id');
            $table->foreign('voucher_id')->references('id')->on('ls_vouchers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ls_cart_session_voucher');
    }
}
