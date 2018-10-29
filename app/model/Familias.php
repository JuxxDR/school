<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 25/10/2018
 * Time: 09:19 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Familias
 *
 * @property int $id
 * @property int $alumno_id
 * @property int $integrantes
 * @property int $numero_hermanos
 * @property int $lugar_hermanos
 * @property int $padres_juntos
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias whereIntegrantes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias whereLugarHermanos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias whereNumeroHermanos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias wherePadresJuntos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Familias extends Model
{
    protected $table = "familias";
    protected $fillable = [
        'integrantes',
        'numero_hermanos',
        'lugar_hermanos',
        'padres_juntos',
    ];
}