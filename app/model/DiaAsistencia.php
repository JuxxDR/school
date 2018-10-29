<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\model\DiaAsistencia
 *
 * @mixin \Eloquent
 */
class DiaAsistencia extends Model
{
    protected $table = 'dia_asistencia';

    protected $fillable = [
        'fecha_entrega',
        'realizada',
    ];
}
