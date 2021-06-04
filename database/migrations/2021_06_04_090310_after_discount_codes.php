<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterDiscountCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->double('amountDiscounted')->nullable();
            $table->double('percentDiscounted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discount_codes', function (Blueprint $table) {
            //
        });
    }
}
