<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('article_id')->unsigned();
            
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->text('comment');
            $table->enum('rate', ['1','2','3','4','5']);
            
            
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
        Schema::drop('reviews');
    }
}
