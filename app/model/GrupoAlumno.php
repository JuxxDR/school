<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\GrupoAlumno
 *
 * @property-read \App\Model\Alumno $alumno
 * @property-read \App\Model\Grupo $grupo
 * @mixin \Eloquent
 * @property int $id
 * @property int $grupo_id
 * @property int $alumno_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GrupoAlumno whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GrupoAlumno whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GrupoAlumno whereGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GrupoAlumno whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GrupoAlumno whereUpdatedAt($value)
 */
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

    public function alumnos()
    {
        return $this->belongsTo(
            Alumno::class,
            'alumno_id',
            'id'
        );
    }
}
