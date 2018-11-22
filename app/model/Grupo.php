<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Grupo
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Anuncio[] $anuncios
 * @property-read \App\Model\Docente $grupo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\GrupoAlumno[] $grupoAlumno
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Tarea[] $tarea
 * @mixin \Eloquent
 * @property int $id
 * @property int $docente_id
 * @property string $aula
 * @property string $grado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Grupo whereAula($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Grupo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Grupo whereDocenteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Grupo whereGrado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Grupo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Grupo whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Tarea[] $tareas
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Grupo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Grupo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Grupo query()
 */
class Grupo extends Model
{
    protected $table = 'grupos';
    protected $fillable = [
        'docente_id',
        'aula',
        'grado',
    ];

    public function grupo()
    {
        return $this->belongsTo(
            Docente::class,
            'docente_id',
            'id'
        );
    }

    public function grupoAlumno()
    {
        return $this->hasMany(
            GrupoAlumno::class,
            'grupo_id',
            'id'
        );
    }

    public function anuncios()
    {
        return $this->hasMany(
            Anuncio::class,
            'grupo_id',
            'id'
        );
    }

    public function tareas()
    {
        return $this->hasMany(
            Tarea::class,
            'grupo_id',
            'id'
        );
    }
}
