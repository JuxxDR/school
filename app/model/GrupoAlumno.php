<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GrupoAlumno extends Model
{
    protected $table = 'grupo_alumno';
    protected $fillable = [
        'grupo_id',
        'alumno_id',
    ];

    public function grupo()
    {
        return $this->belongsTo(
            Grupo::class,
            'grupo_id',
            'id'
        );
    }

    public function alumno()
    {
        return $this->belongsTo(
            Alumno::class,
            'alumno_id',
            'id'
        );
    }
}
