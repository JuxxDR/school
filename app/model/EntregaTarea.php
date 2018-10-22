<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\EntregaTarea
 *
 * @property-read \App\Model\Alumno $alumno
 * @property-read \App\Model\Tarea $tarea
 * @mixin \Eloquent
 * @property int $id
 * @property int $tarea_id
 * @property int $alumno_id
 * @property string $entrego
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EntregaTarea whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EntregaTarea whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EntregaTarea whereEntrego($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EntregaTarea whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EntregaTarea whereTareaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EntregaTarea whereUpdatedAt($value)
 */
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
