<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table){
            $table->increments('id');
            $table->string('customid')->unique()->nullable();
            $table->integer('shopping_cart_id')->unsigned();
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
            $table->string('shipment_agency');
            $table->string('shipment_agency_id');
            $table->string('recipient_name');
            $table->string('recipient_id');
            $table->string('recipient_email');
            $table->string('payment_id');
            $table->enum('edited',['yes','no'])->default('no');
            $table->string('status')->default('En proceso');
            $table->string('guide_number')->nullable();
            $table->integer('total'); /*cambiar por decimal*/
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
         Schema::drop('orders');
    }
}
