<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('car_id');
            $table->unsignedBigInteger('car_maker_id');
            $table->unsignedBigInteger('car_model_id');
            $table->unsignedBigInteger('body_type_id');
            $table->unsignedBigInteger('transmission_id');
            $table->unsignedBigInteger('fuel_type_id');
            $table->unsignedBigInteger('seller_id');

            $table->float('price');
            $table->integer('millage');
            $table->longText('description');
            $table->string('year_manufactured');
            $table->string('status');

            $table->boolean('air_condition')->default(0);
            $table->boolean('power_steering')->default(0);
            $table->boolean('power_window')->default(0);
            $table->boolean('cd_player')->default(0);
            $table->boolean('leather_seats')->default(0);
            $table->boolean('central_locking')->default(0);
            $table->boolean('driver_airbag')->default(0);
            $table->boolean('passenger_airbag')->default(0);

            $table->boolean('New_car');

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
        Schema::dropIfExists('cars');
    }
};
