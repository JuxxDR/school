<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Padre
 *
 * @property int $id
 * @property string $curp
 * @property int $nombre_completo
 * @property int $familia_id
 * @property string $calle
 * @property string $no_ext
 * @property string $no_int
 * @property string $colonia
 * @property string $entre_calle1
 * @property string $entre_calle2
 * @property string $cp
 * @property string $nivel_estudios
 * @property string $edo_civil
 * @property string $ocupacion
 * @property string $lugar_trabajo
 * @property string $tel_fijo
 * @property string $celular
 * @property string $email
 * @property string $red_social
 * @property string $parentesco
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereCalle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereCelular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereColonia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereCp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereCurp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereEdoCivil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereEntreCalle1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereEntreCalle2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereFamiliaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereLugarTrabajo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereNivelEstudios($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereNoExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereNoInt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereNombreCompleto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereOcupacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereParentesco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereRedSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereTelFijo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Padre query()
 */
class Padre extends Model
{
    protected $table = 'padres';
    protected $fillable = [
        "curp",
        "nombre_completo",
        "familia_id",
        "calle",
        "no_ext",
        "no_int",
        "colonia",
        "entre_calle1",
        "entre_calle2",
        "cp",
        "nivel_estudios",
        "edo_civil",
        "ocupacion",
        "lugar_trabajo",
        "tel_fijo",
        "celular",
        "email",
        "red_social",
        "parentesco"
    ];

    public static function rules($prefix = "")
    {
        return
            [
                $prefix . 'nombre_completo' => 'required|max:255',
                $prefix . 'curp' => 'required|max:18|min:18',
                $prefix . 'edo_civil' => 'required|max:255',
                $prefix . 'ocupacion' => 'required|max:255',
                $prefix . 'tel_fijo' => 'required',
                $prefix . 'celular' => 'required',
                $prefix . 'email' => 'required|email',

                $prefix . 'calle' => 'required',
                $prefix . 'no_ext' => 'required|integer',
                $prefix . 'colonia' => 'required',
                $prefix . 'entre_calle1' => 'required',
                $prefix . 'entre_calle2' => 'required',
                $prefix . 'cp' => 'required',

            ];
    }

    public static function messages($prefix = "")
    {
        return
            [
                $prefix . 'nombre_completo.required_without' => 'Ingrese el nombre de alguno de los 2 padres',
                $prefix . 'nombre_completo.required' => 'El nombre es requerido',
                $prefix . 'nombre_completo.max' => 'Nombre demaciado largo',
                $prefix . 'curp.required' => 'El CURP es requerido',
                $prefix . 'curp.min' => 'Verifique su CURP',
                $prefix . 'curp.max' => 'Verifique su CURP',
                $prefix . 'edo_civil.required' => 'El campo es requerido',
                $prefix . 'edo_civil.max' => 'Ingrese un valor más pequeño',
                $prefix . 'ocupacion.required' => 'El campo es requerido',
                $prefix . 'ocupacion.max' => 'Ingrese un valor más pequeño',
                $prefix . 'tel_fijo.required' => 'El campo es requerido',
                $prefix . 'celular.required' => 'El campo es requerido',
                $prefix . 'email.required' => 'El campo es requerido',
                $prefix . 'email.email' => 'Ingrese un email válido',
                $prefix . 'tel_fijo.required' => 'El número es requerido',
                $prefix . 'cel.required' => 'El número es requerido',

                $prefix . 'calle.required' => 'La calle es requerida',
                $prefix . 'no_ext.required' => 'El No . Exterior es requerido',
                $prefix . 'no_ext.integer' => 'Ingrese un valor númerico',
                $prefix . 'colonia.required' => 'La colonia es requerida',
                $prefix . 'entre_calle1.required' => 'La calle es requerida',
                $prefix . 'entre_calle2.required' => 'La calle es requerida',
                $prefix . 'cp.required' => 'El código postal es requerido',
            ];
    }
}
