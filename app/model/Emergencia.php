<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 11/11/2018
 * Time: 07:18 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Emergencia
 *
 * @property int $id
 * @property int $familia_id
 * @property string $nombre1
 * @property string $tel_fijo1
 * @property string $celular1
 * @property string $parentesco1
 * @property string $nombre2
 * @property string $tel_fijo2
 * @property string $celular2
 * @property string $parentesco2
 * @property string $hospital_emergencia
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereCelular1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereCelular2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereFamiliaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereHospitalEmergencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereNombre1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereNombre2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereParentesco1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereParentesco2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereTelFijo1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereTelFijo2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Emergencia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Emergencia extends Model
{
    protected $table = "numeros_emergencia";
    protected $fillable = [
        "nombre1",
        "tel_fijo1",
        "celular1",
        "parentesco1",
        "nombre2",
        "tel_fijo2",
        "celular2",
        "parentesco2",
        "hospital_emergencia",
    ];

    public static function rules()
    {
        return [
            "*" => "required"
        ];
    }

    public static function messages()
    {
        return [
            "*.required" => "El campo es requerido"
        ];
    }

}