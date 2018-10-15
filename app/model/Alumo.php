<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 12/10/2018
 * Time: 10:25 AM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

class Alumo extends Model
{

    protected $table = 'alumno';
    protected $fillable = [
        'numero_alumno',
        'nombre',
        'apellidoP',
        'apellidoM',
        'telefono',
        'curp',
        'fecha_nacimiento',
        'edad',
    ];

    protected $dates = ['fecha_nacimiento'];


    public function tutorAlumno()
    {
        return $this->newHasMany(
            TutorAlumno::class,
            'fk_id_alumno',
            'id'
        );
    }

}