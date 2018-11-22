<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Asistencia
 *
 * @property-read \App\Model\Alumno $alumnoAsistencia
 * @mixin \Eloquent
 * @property int $id
 * @property int $alumno_id
 * @property string $asistio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asistencia whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asistencia whereAsistio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asistencia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asistencia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asistencia whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asistencia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asistencia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asistencia query()
 */
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
