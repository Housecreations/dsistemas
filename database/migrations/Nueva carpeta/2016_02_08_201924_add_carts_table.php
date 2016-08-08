<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('article_cart', function (Blueprint $table) {
            $table->increments('id');
            
             $table->integer('article_id')->unsigned();
            
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            
            $table->integer('cart_id')->unsigned();
            
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            
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
        Schema::drop('carts');
    }
}
