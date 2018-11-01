<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bill', function($table){
        $table->increments('id');
        $table->integer('book_id');
        $table->string('book_name');
        $table->integer('quantity');
        $table->integer('sale_price');
        $table->string('email');
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
      Schema::drop('bill');
    }
}
