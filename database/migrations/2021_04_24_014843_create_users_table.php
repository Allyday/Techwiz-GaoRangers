<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phoneNumber',15)->unique();
            $table->string('userName',500)->unique();
            $table->string('firstName',500);
            $table->string('lastName',500);
            $table->string('password');
            $table->string('gender');
            $table->string('picture');
            $table->string('mail')->unique();
            $table->unsignedInteger('restaurantId')->nullable();
            $table->tinyInteger('type')->default(1);
            $table->foreign('restaurantId')
                ->references('id')
                ->on('restaurants')
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
        Schema::dropIfExists('users');
    }
}
