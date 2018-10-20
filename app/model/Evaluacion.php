<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';
    protected $fillable = [
        'materia_id',
        'alumno_id',
        'evaluacion',
        'trimestre',
    ];

    public function materias()
    {
        return $this->belongsTo(
            Materia::class,
            'materia_id',
            'id'
        );
    }

    public function alumnos()
    {
        return $this->belongsTo(
            Alumno::class,
            'alumno_id',
            'id'
        );
    }
}
