<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $fillable = [
        'email',
        'password',
        'nombre',
        'apellidoP',
        'apellidoM',
        'role',
    ];

    public function grupo()
    {
        return $this->hasOne(
            Grupo::class,
            'docente_id',
            'id'
        );
    }
}
