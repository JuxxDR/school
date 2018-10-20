<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';
    protected $fillable = [
        'nombre',
        'descripcion',
        'detalles',
    ];

    public function evaluaciones()
    {
        return $this->HasMany(
            Evaluacion::class,
            'materia_id',
            'id'
        );
    }
}
