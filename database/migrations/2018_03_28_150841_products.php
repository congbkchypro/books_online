<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function($table){
        $table->increments('id');
        $table->string('name');
        $table->string('category_id');
        $table->string('author');
        $table->string('publisher');
        $table->integer('price');
        $table->integer('sale_price');
        $table->integer('amount');
        $table->integer('pages');
        $table->string('book_size');
        $table->string('images');
        $table->integer('year_publish');
        $table->text('description');
        $table->timestamps();
        $table->foreign('category_id')->references('id')->on('category');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('products');
    }
}
