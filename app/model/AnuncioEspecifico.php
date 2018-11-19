<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\AnuncioEspecifico
 *
 * @property-read \App\Model\Alumno $alumno
 * @mixin \Eloquent
 * @property int $id
 * @property int $alumno_id
 * @property string $nombre
 * @property string $informacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnuncioEspecifico whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnuncioEspecifico whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnuncioEspecifico whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnuncioEspecifico whereInformacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnuncioEspecifico whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnuncioEspecifico whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnuncioEspecifico newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnuncioEspecifico newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnuncioEspecifico query()
 */
class AnuncioEspecifico extends Model
{
    protected $table = 'anuncios_especificos';
    protected $fillable = [
        'alumno_id',
        'nombre',
        'informacion',
    ];

    public function alumno()
    {
        return $this->belongsTo(
            Alumno::class,
            'alumno_id',
            'id'
        );
    }
}
