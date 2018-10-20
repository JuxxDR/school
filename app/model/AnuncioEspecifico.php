<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AnuncioEspecifico extends Model
{
    protected $table = 'anuncios_especificos';
    protected $fillable = [
        'alumno_id',
        'nombre',
        'informacion',
    ];

    public function alumno()
    {
        return $this->belongsTo(
            Alumno::class,
            'alumno_id',
            'id'
        );
    }
}
