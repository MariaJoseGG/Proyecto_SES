<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class SignosVitales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signos_vitales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente');
            $table->date('fecha');
            $table->time('hora');
            $table->float('temperatura');
            $table->float('pulso');
            $table->float('respiracion');
            $table->float('presionarterial');
            $table->float('presionarterial2');
            $table->float('pam');
            $table->float('sat');

            $table->foreign('paciente')->references('id')->on('pacientes');
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
        Schema::dropIfExists('signos_vitales');
    }
}
