<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';
    protected $fillable = [
        'alumno_id',
        'asistio',
    ];

    public function alumnoAsistencia()
    {
        return $this->belongsTo(
            Alumno::class,
            'alumno_id',
            'id'
        );
    }
}
