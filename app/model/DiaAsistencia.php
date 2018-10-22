<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DiaAsistencia extends Model
{
    protected $table = 'dia_asistencia';

    protected $fillable = [
        'fecha_entrega',
        'realizada',
    ];
}
