<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AronTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_tutor');
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('username');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_alumno');
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('telefono');
            $table->string('curp',18);
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->timestamps();
        });

        Schema::create('tutor_alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fk_id_alumno');
            $table->unsignedInteger('fk_id_tutor');


            $table->foreign('fk_id_alumno')
                ->references('id')
                ->on('alumno');
            $table->foreign('fk_id_tutor')
                ->references('id')
                ->on('tutor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutor_alumno');
        Schema::dropIfExists('alumno');
        Schema::dropIfExists('tutor');
    }
}
