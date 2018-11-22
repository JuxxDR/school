<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 11/11/2018
 * Time: 10:04 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Eventos
 *
 * @property int $id
 * @property int $alumno_id
 * @property int $cultural
 * @property int $deportivo
 * @property int $excursion
 * @property int $recreativo
 * @property int $conv_fam
 * @property int $clase_abierta
 * @property int $civicos
 * @property string $pos_asistir
 * @property string $manto_equip
 * @property string $participacion
 * @property string $avances
 * @property string $premio
 * @property string $compromiso
 * @property string $comunicacion
 * @property string $espectativa
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereAvances($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereCivicos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereClaseAbierta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereCompromiso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereComunicacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereConvFam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereCultural($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereDeportivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereEspectativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereExcursion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereMantoEquip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereParticipacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos wherePosAsistir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos wherePremio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereRecreativo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Eventos whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Eventos extends Model
{
    protected $table = "eventos";
    protected $fillable = [
        "cultural",
        "deportivo",
        "excursion",
        "recreativo",
        "conv_fam",
        "clase_abierta",
        "civicos",
        "pos_asistir",
        "manto_equip",
        "participacion",
        "avances",
        "premio",
        "compromiso",
        "comunicacion",
        "espectativa",
    ];

    public static function rules()
    {
        return [
            "cultural"=>'required|max:255',
            "deportivo"=>'required|max:255',
            "excursion"=>'required|max:255',
            "recreativo"=>'required|max:255',
            "conv_fam"=>'required|max:255',
            "clase_abierta"=>'required|max:255',
            "civicos"=>'required|max:255',
            "pos_asistir"=>'required|max:255',
            "manto_equip"=>'required|max:255',
            "participacion"=>'required|max:255',
            "avances"=>'required|max:255',
            "premio"=>'required|max:255',
            "compromiso"=>'required|max:255',
            "comunicacion"=>'required|max:255',
            "espectativa"=>'required|max:255',
        ];
    }

    public static function messages()
    {
        return [
            "*.required" => "El campo es requerido",
            "*.max" => "Ingrese un texto más pequeño"
        ];
    }
}