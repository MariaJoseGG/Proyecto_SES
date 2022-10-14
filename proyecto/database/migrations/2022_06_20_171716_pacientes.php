<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('documento')->unique();
            $table->string('tipoDoc');
            $table->string('nombre');
            $table->string('entidad');
            $table->string('sexo');
            $table->integer('edad');
            $table->string('regimen');
            $table->string('tipoAfiliacion');
            $table->string('cama');
            $table->date('fechaIngreso');
            $table->unsignedBigInteger('auxiliarId');
            $table->string('estado')->default("Activo");
            
            $table->foreign('auxiliarId')->references('id')->on('users');
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
        Schema::dropIfExists('pacientes');
    }
}
