<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 12/10/2018
 * Time: 10:25 AM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{

    protected $table = 'tutor';
    protected $fillable = [
        'numero_tutor',
        'nombre',
        'apellidoP',
        'apellidoM',
        'username',
        'password',
    ];

    public function tutorAlumno()
    {
        return $this->newHasMany(
            TutorAlumno::class,
            'fk_id_tutor',
            'id'
        );
    }

}