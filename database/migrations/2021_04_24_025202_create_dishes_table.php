<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',500);
            $table->string('description')->nullable();
            $table->double('price')->nullable();
            $table->unsignedInteger('restaurantId');
            $table->unsignedInteger('dishCategoryId')->nullable();
            $table->timestamps();
            $table->foreign('restaurantId')->references('id')
                ->on('restaurants')
                ->onDelete('cascade');
            $table->foreign('dishCategoryId')->references('id')
                ->on('dish_categories')
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
        Schema::dropIfExists('dishes');
    }
}
