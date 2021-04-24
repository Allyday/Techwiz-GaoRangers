<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_tags', function (Blueprint $table) {
            $table->unsignedInteger('dishId');
            $table->unsignedInteger('foodTagId');
            $table->timestamps();
            $table->foreign('dishId')->references('id')
                ->on('dishes')
                ->onDelete('cascade');
            $table->foreign('foodTagId')->references('id')
                ->on('food_tags')
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
        Schema::dropIfExists('dish_tags');
    }
}
