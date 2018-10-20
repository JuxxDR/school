<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';
    protected $fillable = [
        'grupo_id',
        'nombre',
        'descripcion',
        'fecha_entrega',
    ];

    public function entregaTarea()
    {
        return $this->hasMany(
            EntregaTarea::class,
            'tarea_id',
            'id'
        );
    }

    public function grupo()
    {
        return $this->belongsTo(
            Grupo::class,
            'grupo_id',
            'id'
        );
    }
}
