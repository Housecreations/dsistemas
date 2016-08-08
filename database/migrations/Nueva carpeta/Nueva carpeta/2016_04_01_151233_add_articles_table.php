<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            
             $table->integer('category_id')->unsigned();
            
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            $table->string('name');
            $table->string('description');
            $table->enum('ondiscount',['yes','no'])->default('no');
          
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
        Schema::drop('articles');
    }
}
