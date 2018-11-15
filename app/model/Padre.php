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
 */
class Padre extends Model
{
    protected $table = 'padres';
}
