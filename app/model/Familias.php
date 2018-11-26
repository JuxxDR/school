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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Familias query()
 * @property-read \App\model\PersonasAut $autorizadas
 * @property-read \App\model\Emergencia $emergencia
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\model\Padre[] $padres
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

    public static function rules()
    {
        return
            [
                'integrantes' => 'required|max:255|numeric|min:2',
                'numero_hermanos' => 'required|max:255|numeric|min:1',
                'lugar_hermanos' => 'required|max:255|numeric|min:1',
                'padres_juntos' => 'required',
            ];
    }

    public static function messages()
    {
        return
            [
                'integrantes.required' => 'El campo es requerido.',
                'integrantes.max' => 'Ingrese un valor mas pequeño.',
                'numero_hermanos.max' => 'Ingrese un valor mas pequeño.',
                'integrantes.numeric' => 'Ingrese un valor númerico.',
                'integrantes.min' => 'Ingrese un valor mayor a 1',
                'numero_hermanos.required' => 'El campo es requerido.',
                'numero_hermanos.max' => 'Ingrese un valor mas pequeño.',
                'numero_hermanos.numeric' => 'Ingrese un valor númerico.',
                'numero_hermanos.min' => 'Ingrese un valor mayor a 0',
                'lugar_hermanos.required' => 'El campo es requerido.',
                'lugar_hermanos.max' => 'Ingrese un valor mas pequeño.',
                'lugar_hermanos.numeric' => 'Ingrese un valor númerico.',
                'lugar_hermanos.min' => 'Ingrese un valor mayor a 0',
                'padres_juntos.required' => 'El campo es requerido.',
            ];
    }

    public function padres()
    {
        return $this->hasMany(
            Padre::class,
            'familia_id',
            'id'
        );
    }

    public function emergencia()
    {
        return $this->hasOne(
            Emergencia::class,
            'familia_id',
            'id'
        );
    }

    public function autorizadas()
    {
        return $this->hasOne(
            PersonasAut::class,
            'familia_id',
            'id'
        );
    }
}