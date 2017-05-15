<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned()->default(0);
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->boolean('has_occured')->default(0);
            $table->string('patient_name')->default("");
            $table->dateTime('time_from');
            $table->dateTime('time_to');
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
        Schema::drop('appointments');
    }
}
