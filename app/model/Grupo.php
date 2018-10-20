<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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

    public function tarea()
    {
        return $this->hasMany(
            Tarea::class,
            'grupo_id',
            'id'
        );
    }
}
