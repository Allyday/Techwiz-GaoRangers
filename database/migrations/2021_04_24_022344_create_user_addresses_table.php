<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->string('city',500)->nullable();
            $table->string('district',500)->nullable();
            $table->string('municipality',500)->nullable();
            $table->string('street',500)->nullable();
            $table->string('houseNumber',15);
            $table->string('latLon')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('isDefault')->default(0);
            $table->timestamps();
            $table->foreign('userId')->references('id')
                ->on('users')
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
        Schema::dropIfExists('user_addresses');
    }
}
