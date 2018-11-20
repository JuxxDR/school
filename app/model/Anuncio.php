<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Anuncio
 *
 * @property-read \App\Model\Grupo $grupo
 * @mixin \Eloquent
 * @property int $id
 * @property int $grupo_id
 * @property string $nombre
 * @property string $informacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Anuncio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Anuncio whereGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Anuncio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Anuncio whereInformacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Anuncio whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Anuncio whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Anuncio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Anuncio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Anuncio query()
 */
class Anuncio extends Model
{
    protected $table = 'anuncios';
    protected $fillable = [
        'grupo_id',
        'nombre',
        'informacion',
        'importancia',
        'observaciones'
    ];

    public function grupo()
    {
        return $this->belongsTo(
            Grupo::class,
            'grupo_id',
            'id'
        );
    }
}
