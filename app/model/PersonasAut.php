<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 11/11/2018
 * Time: 09:15 PM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\model\PersonasAut
 *
 * @property int $id
 * @property int $familia_id
 * @property string $nombre1
 * @property string $nombre2
 * @property string $nombre3
 * @property string $nombre4
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut whereFamiliaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut whereNombre1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut whereNombre2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut whereNombre3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut whereNombre4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\model\PersonasAut whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PersonasAut extends Model
{

    protected $table = "autorizadas";
    protected $fillable = [
        "nombre1",
        "nombre2",
        "nombre3",
        "nombre4",
    ];

    public static function rules()
    {
        return [
            "nombre1" => 'required',
            "nombre2" => 'required',
            "nombre3" => 'required',
            "nombre4" => 'required',
        ];
    }

    public static function messages()
    {
        return [
            "*.required" => "El campo es requerido"
        ];
    }
}