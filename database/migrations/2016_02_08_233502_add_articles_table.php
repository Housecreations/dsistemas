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
            $table->integer('stock');
            $table->integer('discount');
            $table->decimal('price', 10, 2);
            $table->enum('ondiscount',['yes','no'])->default('no');
           $table->enum('visible',['yes','no'])->default('yes');
          
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
