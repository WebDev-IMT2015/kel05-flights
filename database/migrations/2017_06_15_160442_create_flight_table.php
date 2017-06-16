<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('flight_code');
            $table->string('flight_source');
            $table->string('flight_destination');
            $table->integer('capacity');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->double('price');
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
        Schema::drop('flights');
    }
}
