<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_sale_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->unsignedInteger('sale_id');
            $table->foreign('sale_id')->references('id')->on('ls_sales')->onDelete('cascade');

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
        Schema::dropIfExists('ls_sale_translations');
    }
}
