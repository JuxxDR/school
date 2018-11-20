<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 05:45 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Folios
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Inscripciones[] $inscripciones
 * @mixin \Eloquent
 * @property int $id
 * @property string $folio
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Folios whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Folios whereFechaFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Folios whereFechaInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Folios whereFolio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Folios whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Folios whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Folios newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Folios newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Folios query()
 */
class Folios extends Model
{
    protected $table = 'folios';

    public static function rules()
    {
        return [
            'folio'=>'required|exists:folios,folio'
        ];
    }

    public static function messages()
    {
        return [
            'folio.required'=>'Ingrese un folio',
            'folio.exists'=>'El folio ingresado no es válido, verifique su información.'
        ];
    }

    public function inscripciones()
    {
        return $this->hasMany(
            Inscripciones::class,
            'folio_id',
            'id'
        );
    }
}