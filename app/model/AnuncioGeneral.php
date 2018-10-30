<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\model\AnuncioGeneral
 *
 * @mixin \Eloquent
 */
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
