<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('customer', function($table){
        $table->string('email');
        $table->string('password');
        $table->string('fullname');
        $table->string('address');
        $table->string('province');
        $table->string('phonenumber');
        $table->timestamps();

        $table->primary('email');
        // $table->foreign('category_id')->references('id')->on('category');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('customer');
    }
}
