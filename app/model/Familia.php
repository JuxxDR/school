<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Familia
 *
 * @property int $id
 * @property int $alumno_id
 * @property int $integrantes
 * @property int $numero_hermanos
 * @property int $lugar_hermanos
 * @property int $padres_juntos
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familia whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familia whereIntegrantes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familia whereLugarHermanos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familia whereNumeroHermanos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familia wherePadresJuntos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Familia extends Model
{
    protected $table = 'familias';
}
