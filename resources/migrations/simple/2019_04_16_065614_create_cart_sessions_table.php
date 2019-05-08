<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_cart_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_token')->unique();
            $table->unsignedBigInteger('shipping_option_id');
            $table->foreign('shipping_option_id')->references('id')->on('ls_shipping_options')->onDelete('restrict');
            $table->json('billing_address')->nullable();
            $table->json('shipping_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ls_cart_sessions');
    }
}
