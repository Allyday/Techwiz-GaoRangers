<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('restaurantId');
            $table->double('totalDishPrice')->default(0)->nullable();
            $table->double('deliveryFee')->default(0)->nullable();
            $table->double('discountAmount')->default(0)->nullable();
            $table->unsignedInteger('discountCodeId')->nullable();
            $table->string('address',500)->nullable();
            $table->dateTime('timeCreated')->nullable();
            $table->dateTime('timeAccepted')->nullable();
            $table->dateTime('timeDoneCooking')->nullable();
            $table->dateTime('timePickedUp')->nullable();
            $table->dateTime('timeDelivered')->nullable();
            $table->dateTime('timeRejected')->nullable();
            $table->dateTime('timeCancelled')->nullable();
            $table->string('acceptedBy')->nullable();
            $table->string('doneCookingBy')->nullable();
            $table->tinyInteger('orderStatus')->default(1);
            $table->timestamps();
            $table->foreign('userId')->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('restaurantId')->references('id')
                ->on('restaurants')
                ->onDelete('cascade');
            $table->foreign('discountCodeId')->references('id')
                ->on('discount_codes')
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
        Schema::dropIfExists('orders');
    }
}
