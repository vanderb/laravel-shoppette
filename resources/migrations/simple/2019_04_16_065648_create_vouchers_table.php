<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code')->unique();
            $table->unsignedDecimal('discount_amount', 8 ,2)->nullable();
            $table->unsignedDecimal('discount_percentage', 8 ,2)->nullable();
            $table->unsignedBigInteger('qty')->nullable();
            $table->timestamp('expires_on')->nullable();
            $table->boolean('active')->default(0);

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
        Schema::dropIfExists('ls_vouchers');
    }
}
