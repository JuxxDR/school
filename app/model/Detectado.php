<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 25/10/2018
 * Time: 10:26 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\model\Detectado
 *
 * @property int $id
 * @property int $salud_id
 * @property int $d1
 * @property int $d2
 * @property int $d3
 * @property int $d4
 * @property int $d5
 * @property int $d6
 * @property int $d7
 * @property int $d8
 * @property int $d9
 * @property int $d10
 * @property int $d11
 * @property int $d12
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereD9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereSaludId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\Detectado whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Detectado extends Model
{
    protected $table = "detectado";
    protected $fillable = [
        'd1',
        'd2',
        'd3',
        'd4',
        'd5',
        'd6',
        'd7',
        'd8',
        'd9',
        'd10',
        'd11',
        'd12',
        'd13',
    ];
}