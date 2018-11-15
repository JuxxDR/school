<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 05:49 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Inscripciones
 *
 * @property-read \App\model\Folios $folio
 * @mixin \Eloquent
 * @property int $id
 * @property int $folio_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Inscripciones whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Inscripciones whereFolioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Inscripciones whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Inscripciones whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Alumno[] $alumno
 */
class Inscripciones extends Model
{
    protected $table = 'inscripciones';


    public function folio()
    {
        return $this->belongsTo(
            Folios::class,
            'folio_id',
            'id'
        );
    }

    public function alumno(){
        return $this->hasMany(
            Alumno::class,
            'inscripcion_id',
            'id'
        );
    }
}