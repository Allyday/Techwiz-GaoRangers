<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDishes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OrderDish', function (Blueprint $table) {
            $table->unsignedInteger('orderId');
            $table->unsignedInteger('dishId');
            $table->string('note',1000)->nullable();
            $table->integer('dishQuantity')->default(1);
            $table->timestamps();
            $table->foreign('orderId')->references('id')
                ->on('orders')
                ->onDelete('cascade');
            $table->foreign('dishId')->references('id')
                ->on('dishes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OrderDish');
    }
}
