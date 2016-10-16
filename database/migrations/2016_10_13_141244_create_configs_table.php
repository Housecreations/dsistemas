<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->engine('InnoDB');
            $table->increments('id');
            $table->enum('active',['yes','no'])->default('yes');
            $table->string('currency');
            $table->string('currency_code');
            $table->string('sender_email');
            $table->string('sender_name');
            $table->string('receiver_email');
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
        Schema::drop('configs');
    }
}
