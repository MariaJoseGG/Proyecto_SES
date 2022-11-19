<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Turno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->engine="InnoDB";

            $table->id();
            $table->date('fechaIngreso');
            $table->bigInteger('horaInicio')->unsigned();
            $table->date('fechaSalida');
            $table->bigInteger('horaFin')->unsigned();

            $table->bigInteger('auxiliarId')->unsigned();

            $table->timestamps();

            $table->foreign('auxiliarId')->references('id')->on('users')->onDelete("cascade");
            $table->foreign('horaInicio')->references('id')->on('hours')->onDelete("cascade");
            $table->foreign('horaFin')->references('id')->on('hours')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
}