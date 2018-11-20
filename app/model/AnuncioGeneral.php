<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\model\AnuncioGeneral
 *
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AnuncioGeneral newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AnuncioGeneral newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AnuncioGeneral query()
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
