<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $fillable = [
        'grado',
        'inscripcion_id',
        'nombre',
        'apellidoP',
        'apellidoM',
        'curp',
        'fecha_nacimiento',
        'edad',
        'meses',
        'calle',
        'no_ext',
        'no_int',
        'colonia',
        'entre_calle1',
        'entre_calle2',
        'cp',
        'punto_referencia',
        'municipio',
        'tel_casa',
        'cel',
    ];

    protected $dates = ['fecha_nacimiento'];

    public function evaluaciones()
    {
        return $this->HasMany(
            Evaluacion::class,
            'alumno_id',
            'id'
        );
    }

    public function asistencias()
    {
        return $this->HasMany(
            Asistencia::class,
            'alumno_id',
            'id'
        );
    }

    public function grupoAlumno()
    {
        return $this->HasMany(
            GrupoAlumno::class,
            'alumno_id',
            'id'
        );
    }

    public function entregaTarea()
    {
        return $this->HasMany(
            EntregaTarea::class,
            'alumno_id',
            'id'
        );
    }

    public function anuncios()
    {
        return $this->HasMany(
            AnuncioEspecifico::class,
            'alumno_id',
            'id'
        );
    }
}
