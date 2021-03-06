<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 25/10/2018
 * Time: 09:29 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\model\InfSalud
 *
 * @property int $id
 * @property int $alumno_id
 * @property string $sexo
 * @property string $enfermedad
 * @property string $vacunas_aplicadas
 * @property int $ban_alergia
 * @property string $alergia
 * @property string $carac_especial
 * @property string $tipo_sangre
 * @property string $enfermedad_ult_mes
 * @property string $enfermedad_frecuente
 * @property string $medico_familiar
 * @property string $talla
 * @property string $peso
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereAlergia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereBanAlergia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereCaracEspecial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereEnfermedad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereEnfermedadFrecuente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereEnfermedadUltMes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereMedicoFamiliar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud wherePeso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereSexo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereTalla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereTipoSangre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereVacunasAplicadas($value)
 * @mixin \Eloquent
 * @property string|null $recomendaciones_especiales
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud whereRecomendacionesEspeciales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\InfSalud query()
 * @property-read \App\model\AntecedesntesHereditarios $antecedentes
 * @property-read \App\model\Detectado $detectado
 * @property-read \App\model\Enfermedades $enfermedades
 */
class InfSalud extends Model
{
    protected $table = "inf_salud";

    protected $fillable = [
        'alumno_id',
        'sexo',
        'enfermedades',
        'enfermedad',
        'vacunas_aplicadas',
        'ban_alergia',
        'alergia',
        'talla',
        'peso',
        'carac_especial',
        'tipo_sangre',
        'enfermedad_ult_mes',
        'enfermedad_frecuente',
        'medico_familiar'
    ];

    public static function rules($prefix = "")
    {
        return [
            $prefix . 'enfermedad' => 'required',
            $prefix . 'vacunas_aplicadas' => 'required',
            $prefix . 'carac_especial' => 'required',
            $prefix . 'enfermedad_ult_mes' => 'required',
            $prefix . 'enfermedad_frecuente' => 'required',
            $prefix . 'medico_familiar' => 'required',
            $prefix . 'talla' => 'required|integer|max:200',
            $prefix . 'peso' => 'required|numeric|max:50',
        ];
    }

    public static function messages($prefix = "")
    {
        return [
            $prefix . 'enfermedad.required' => 'El campo es requerido',
            $prefix . 'vacunas_aplicadas.required' => 'El campo es requerido',
            $prefix . 'carac_especial.required' => 'El campo es requerido',
            $prefix . 'enfermedad_ult_mes.required' => 'El campo es requerido',
            $prefix . 'enfermedad_frecuente.required' => 'El campo es requerido',
            $prefix . 'medico_familiar.required' => 'El campo es requerido',
            $prefix . 'talla.required' => 'El campo es requerido',
            $prefix . 'talla.integer' => 'Ingrese valores enteros',
            $prefix . 'talla.max' => 'Ingrese un valor más pequeño',
            $prefix . 'peso.required' => 'El campo es requerido',
            $prefix . 'peso.max' => 'Ingrese un valor más pequeño.',
            $prefix . 'peso.numeric' => 'Ingrese un valor númerico.',
        ];
    }

    public function detectado()
    {
        return $this->hasOne(
            Detectado::class,
            'salud_id',
            'id'
        );
    }

    public function antecedentes()
    {
        return $this->hasOne(
            AntecedesntesHereditarios::class,
            'salud_id',
            'id'
        );
    }

    public function enfermedades()
    {
        return $this->hasOne(
            Enfermedades::class,
            'salud_id',
            'id'
        );
    }
}