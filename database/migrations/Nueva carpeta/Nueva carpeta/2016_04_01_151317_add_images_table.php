<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('articles_detail_id')->unsigned();
            
            $table->foreign('articles_detail_id')->references('id')->on('articlesDetails')->onDelete('cascade');
            
             $table->string('image_URL');
           
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
        Schema::drop('images');
    }
}
