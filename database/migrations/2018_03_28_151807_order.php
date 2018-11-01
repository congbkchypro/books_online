<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('order', function($table){
        $table->increments('id');
        $table->date('order_date');
        $table->integer('total');
        $table->integer('payment_id');
        $table->string('address');
        $table->string('email');
        $table->timestamps();
        $table->foreign('payment_id')->references('id')->on('payment');
        $table->foreign('email')->references('email')->on('customer');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('order');
    }
}
