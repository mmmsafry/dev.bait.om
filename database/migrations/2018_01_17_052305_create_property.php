<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('property', function (Blueprint $table) {
            $table->increments('property_id');
			$table->integer('user_id');
			$table->integer('country_id');
            $table->integer('city_id');
			$table->integer('property_type_id');
			$table->integer('furniture_type_id');
			$table->integer('category_type_id');
			$table->string('property_name');
            $table->text('description');
			$table->double('property_price', 8, 2);
			$table->double('area', 8, 2);
			$table->integer('rent_duration');
			$table->text('property_adderss');
			$table->string('telephone_number');
			$table->string('mobile_number');
			$table->string('permit_No');
			$table->string('reference');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('property');
    }
}
