<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 25/10/2018
 * Time: 11:08 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;


/**
 * App\model\AntecedesntesHereditarios
 *
 * @property int $id
 * @property int $salud_id
 * @property int $fam_diab
 * @property int $fam_cor
 * @property int $fam_hip
 * @property int $fam_can
 * @property string $parentesco_diab
 * @property string $parentesco_cor
 * @property string $parentesco_hip
 * @property string $parentesco_can
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereFamCan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereFamCor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereFamDiab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereFamHip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereParentescoCan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereParentescoCor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereParentescoDiab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereParentescoHip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereSaludId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\AntecedesntesHereditarios query()
 */
class AntecedesntesHereditarios extends Model
{
    protected $table = "antecendentes_hereditarios";
    protected $fillable = [
        'salud_id',
        'fam_diab',
        'fam_cor',
        'fam_hip',
        'fam_can',
        'parentesco_diab',
        'parentesco_cor',
        'parentesco_hip',
        'parentesco_can',
    ];
}