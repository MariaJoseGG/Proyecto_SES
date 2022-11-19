<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdministrarDiagnostico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AdministrarDiagnostico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente');
            $table->date('fecha');
            $table->string('tipoPadecimiento');
            $table->longText('descripcion');
            
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
        Schema::dropIfExists('AdministrarDiagnostico');
    }
}
