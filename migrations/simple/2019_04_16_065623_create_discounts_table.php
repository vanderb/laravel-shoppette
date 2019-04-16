<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedDecimal('discount_amount', 8 ,2)->nullable();
            $table->unsignedDecimal('discount_percentage', 8 ,2)->nullable();
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
        Schema::dropIfExists('ls_discounts');
    }
}
