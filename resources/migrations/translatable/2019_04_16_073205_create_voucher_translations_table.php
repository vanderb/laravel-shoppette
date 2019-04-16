<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_voucher_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->unsignedInteger('voucher_id');
            $table->foreign('voucher_id')->references('id')->on('ls_vouchers')->onDelete('cascade');

            $table->string('language_id')->index();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ls_voucher_translations');
    }
}
