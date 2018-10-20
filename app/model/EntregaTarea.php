<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EntregaTarea extends Model
{
    protected $table = 'entrega_tarea';
    protected $fillable = [
        'tarea_id',
        'alumno_id',
        'entrego',
    ];

    public function tarea()
    {
        return $this->belongsTo(
            Tarea::class,
            'tarea_id',
            'id'
        );
    }

    public function alumno()
    {
        return $this->belongsTo(
            Alumno::class,
            'tarea_id',
            'id'
        );
    }
}
