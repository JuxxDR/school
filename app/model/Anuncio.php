<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncios';
    protected $fillable = [
        'grupo_id',
        'nombre',
        'informacion',
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
