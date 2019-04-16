<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedDecimal('discount_percentage',8, 2);
            $table->timestamp('starts_on')->nullable();
            $table->timestamp('ends_on')->nullable();
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
        Schema::dropIfExists('ls_sales');
    }
}
