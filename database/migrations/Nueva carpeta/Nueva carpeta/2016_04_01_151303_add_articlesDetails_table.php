<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticlesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articlesDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            
            $table->string('color');
            $table->string('size');
            $table->integer('stock');
            $table->integer('discount');
            $table->double('price');
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
        Schema::drop('articlesDetails');
    }
}
