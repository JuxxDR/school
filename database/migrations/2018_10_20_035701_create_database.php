<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        $this->down();
        //Tablas Fredy

        Schema::create('folios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folio')->unique();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();
        });

        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('folio_id');
            $table->foreign('folio_id')->references('id')->on('folios');

            $table->timestamps();
        });

        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_control')->unique();
            $table->string('password');
            $table->Integer('grado');

            $table->unsignedInteger('inscripcion_id');
            $table->foreign('inscripcion_id')->references('id')->on('inscripciones');

            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('curp');
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->integer('meses');
            $table->string('calle');
            $table->string('no_ext');
            $table->string('no_int');
            $table->string('colonia');
            $table->string('entre_calle1');
            $table->string('entre_calle2');
            $table->string('cp');
            $table->string('punto_referencia');
            $table->string('municipio');
            $table->string('estado');
            $table->string('tel_casa');
            $table->string('cel');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('reinscripciones', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->timestamps();
        });

        Schema::create('familias', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->integer('integrantes');
            $table->integer('numero_hermanos');
            $table->integer('lugar_hermanos');
            $table->boolean('padres_juntos');
            $table->timestamps();
        });

        Schema::create('numeros_emergencia', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('familia_id');
            $table->foreign('familia_id')->references('id')->on('familias');

            $table->string('nombre1');
            $table->string('tel_fijo1');
            $table->string('celular1');
            $table->string('parentesco1');
            $table->string('nombre2');
            $table->string('tel_fijo2');
            $table->string('celular2');
            $table->string('parentesco2');
            $table->string('hospital_emergencia');
            $table->timestamps();
        });

        Schema::create('autorizadas', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('familia_id');
            $table->foreign('familia_id')->references('id')->on('familias');

            $table->string('nombre1');
            $table->string('nombre2');
            $table->string('nombre3');
            $table->string('nombre4');
            $table->timestamps();
        });

        Schema::create('padres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('curp')->nullable();
            $table->string('nombre_completo')->nullable();
            $table->unsignedInteger('familia_id')->nullable();
            $table->string('calle')->nullable();
            $table->string('no_ext')->nullable();
            $table->string('no_int')->nullable();
            $table->string('colonia')->nullable();
            $table->string('entre_calle1')->nullable();
            $table->string('entre_calle2')->nullable();
            $table->string('cp')->nullable();
            $table->string('nivel_estudios')->nullable();
            $table->string('edo_civil')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->string('tel_fijo')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('red_social')->nullable();
            $table->string('parentesco')->nullable(); //0.-Papa 1.-Mama
            $table->foreign('familia_id')->references('id')->on('familias');;
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('inf_salud', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');;
            $table->string('sexo');
            $table->string('enfermedad');
            $table->string('vacunas_aplicadas');
            $table->smallInteger('ban_alergia');
            $table->string('alergia')->nullable();
            $table->string('carac_especial');
            $table->string('tipo_sangre');
            $table->string('enfermedad_ult_mes');
            $table->string('enfermedad_frecuente');
            $table->string('medico_familiar');
            $table->string('talla');
            $table->string('peso');
            $table->string('recomendaciones_especiales');

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');;
            $table->smallInteger('cultural');
            $table->smallInteger('deportivo');
            $table->smallInteger('excursion');
            $table->smallInteger('recreativo');
            $table->smallInteger('conv_fam');
            $table->smallInteger('clase_abierta');
            $table->smallInteger('civicos');
            $table->string('pos_asistir');
            $table->string('manto_equip');
            $table->string('participacion');
            $table->string('avances');
            $table->string('premio');
            $table->string('compromiso');
            $table->string('comunicacion');
            $table->string('espectativa');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('enfermedades', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('salud_id');
            $table->foreign('salud_id')->references('id')->on('inf_salud');

            $table->smallInteger('e1');
            $table->smallInteger('e2');
            $table->smallInteger('e3');
            $table->smallInteger('e4');
            $table->smallInteger('e5');
            $table->smallInteger('e6');
            $table->smallInteger('e7');
            $table->smallInteger('e8');
            $table->smallInteger('e9');
            $table->smallInteger('e10');
            $table->smallInteger('e11');
            $table->smallInteger('e12');
            $table->smallInteger('e13');
            $table->string('especifique')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('detectado', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('salud_id');
            $table->foreign('salud_id')->references('id')->on('inf_salud');

            $table->smallInteger('d1');
            $table->smallInteger('d2');
            $table->smallInteger('d3');
            $table->smallInteger('d4');
            $table->smallInteger('d5');
            $table->smallInteger('d6');
            $table->smallInteger('d7');
            $table->smallInteger('d8');
            $table->smallInteger('d9');
            $table->smallInteger('d10');
            $table->smallInteger('d11');
            $table->smallInteger('d12');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('antecendentes_hereditarios', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('salud_id');
            $table->foreign('salud_id')->references('id')->on('inf_salud');
            $table->smallInteger('fam_diab');
            $table->smallInteger('fam_cor');
            $table->smallInteger('fam_hip');
            $table->smallInteger('fam_can');
            $table->string('parentesco_diab')->nullable();
            $table->string('parentesco_cor')->nullable();
            $table->string('parentesco_hip')->nullable();
            $table->string('parentesco_can')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        //Tablas Aaron

        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('detalles');
            $table->timestamps();
        });

        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('materia_id');
            $table->foreign('materia_id')->references('id')->on('materias');

            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->string('evaluacion');
            $table->integer('trimestre');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->string('asistio');
            $table->timestamps();
        });

        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->smallInteger('role')->default(1); //0.-Administrativo 1.-Docente
            $table->timestamps();
        });

        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('docente_id');
            $table->foreign('docente_id')->references('id')->on('docentes');

            $table->string('aula');
            $table->string('grado');
            $table->timestamps();
        });

        Schema::create('grupo_alumno', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos');

            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->timestamps();
        });

        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos');

            $table->string('nombre');
            $table->string('descripcion');
            $table->date('fecha_entrega');
            $table->timestamps();
        });

        Schema::create('entrega_tarea', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('tarea_id');
            $table->foreign('tarea_id')->references('id')->on('tareas');

            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->string('entrego');
            $table->timestamps();
        });

        //Tablas Jorge

        Schema::create('anuncios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos');

            $table->string('nombre');
            $table->string('informacion');
            $table->timestamps();
        });

        Schema::create('anuncios_especificos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->string('nombre');
            $table->string('informacion');
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
        Schema::dropIfExists('anuncios_especificos');
        Schema::dropIfExists('anuncios');
        Schema::dropIfExists('entrega_tarea');
        Schema::dropIfExists('tareas');
        Schema::dropIfExists('grupo_alumno');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('docentes');
        Schema::dropIfExists('asistencias');
        Schema::dropIfExists('evaluaciones');
        Schema::dropIfExists('materias');
        Schema::dropIfExists('antecendentes_hereditarios');
        Schema::dropIfExists('detectado');
        Schema::dropIfExists('enfermedades');
        Schema::dropIfExists('eventos');
        Schema::dropIfExists('inf_salud');
        Schema::dropIfExists('padres');
        Schema::dropIfExists('autorizadas');
        Schema::dropIfExists('numeros_emergencia');
        Schema::dropIfExists('familias');
        Schema::dropIfExists('reinscripciones');
        Schema::dropIfExists('alumnos');
        Schema::dropIfExists('inscripciones');
        Schema::dropIfExists('folios');
    }

}
