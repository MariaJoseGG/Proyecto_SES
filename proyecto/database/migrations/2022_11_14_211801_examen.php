<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Examen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipoExamen');
            $table->unsignedBigInteger('paciente');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('doctor');
            $table->unsignedBigInteger('jefe');
            $table->integer('estado')->default(0); //El estado solo se cambia cuando se edite el registro            
            $table->timestamps();

            $table->foreign('tipoExamen')->references('id')->on('tipo_examen');
            $table->foreign('paciente')->references('id')->on('pacientes');
            $table->foreign('doctor')->references('id')->on('doctor');
            $table->foreign('jefe')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen');
    }
}