<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 25/10/2018
 * Time: 10:12 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Enfermedades
 *
 * @property int $id
 * @property int $salud_id
 * @property int $e1
 * @property int $e2
 * @property int $e3
 * @property int $e4
 * @property int $e5
 * @property int $e6
 * @property int $e7
 * @property int $e8
 * @property int $e9
 * @property int $e10
 * @property int $e11
 * @property int $e12
 * @property int $e13
 * @property string $especifique
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE13($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereE9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereEspecifique($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereSaludId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Enfermedades whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Enfermedades extends Model
{
    protected $table = "enfermedades";
    protected $fillable = [
        'e1',
        'e2',
        'e3',
        'e4',
        'e5',
        'e6',
        'e7',
        'e8',
        'e9',
        'e10',
        'e11',
        'e12',
        'e13',
    ];
}