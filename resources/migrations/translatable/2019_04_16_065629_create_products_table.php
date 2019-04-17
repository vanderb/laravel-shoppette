<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedDecimal('price', 8, 2);
            $table->unsignedDecimal('weight', 8, 2);
            $table->string('photo')->nullable();
            $table->boolean('listed')->default(1);
            $table->boolean('active')->default(1);
            $table->boolean('out_of_stock')->default(0);
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
        Schema::dropIfExists('ls_products');
    }
}
