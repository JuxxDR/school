<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Evaluacion
 *
 * @property-read \App\Model\Alumno $alumnos
 * @property-read \App\Model\Materia $materias
 * @mixin \Eloquent
 * @property int $id
 * @property int $materia_id
 * @property int $alumno_id
 * @property string $evaluacion
 * @property int $trimestre
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion whereEvaluacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion whereMateriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion whereTrimestre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Evaluacion query()
 */
class Evaluacion extends Model
{
    protected $table = 'evaluaciones';
    protected $fillable = [
        'materia_id',
        'alumno_id',
        'evaluacion',
        'trimestre',
    ];

    public function materias()
    {
        return $this->belongsTo(
            Materia::class,
            'materia_id',
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
