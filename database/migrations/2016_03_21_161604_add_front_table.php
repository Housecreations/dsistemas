<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFrontTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front', function (Blueprint $table) {
            $table->increments('id');
            $table->string('new_collection');
            $table->string('men');
            $table->string('women');
            $table->string('acc');
            $table->string('outlet');
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
        Schema::drop('front');
    }
}
