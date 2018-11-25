<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 24/11/2018
 * Time: 06:54 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Reinscripcion
 *
 * @property int $id
 * @property int $alumno_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Reinscripcion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Reinscripcion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Reinscripcion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Reinscripcion whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Reinscripcion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Reinscripcion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Reinscripcion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reinscripcion extends Model
{
    protected $table = "reinscripciones";
    protected $fillable = [

    ];
}