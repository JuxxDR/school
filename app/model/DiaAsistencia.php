<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\model\DiaAsistencia
 *
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\DiaAsistencia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\DiaAsistencia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\DiaAsistencia query()
 */
class DiaAsistencia extends Model
{
    protected $table = 'dia_asistencia';

    protected $fillable = [
        'fecha_entrega',
        'realizada',
    ];
}
