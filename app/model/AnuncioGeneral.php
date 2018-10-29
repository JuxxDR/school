<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class AnuncioGeneral extends Model
{
    protected $table = 'anuncios_generales';
    protected $fillable = [
        'nombre',
        'informacion',
        'importancia',
        'observaciones'
    ];
}
