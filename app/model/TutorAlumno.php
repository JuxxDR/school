<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 12/10/2018
 * Time: 10:38 AM
 */

namespace App\model;


use Illuminate\Database\Eloquent\Model;

class TutorAlumno extends Model
{

    protected $table = 'tutor_alumno';
    public $timestamps = false;
    protected $fillable = [
        'fk_id_alumno',
        'fk_id_tutor'
    ];

    public function tutor()
    {
        return $this->belongsTo(
            Tutor::class,
            'fk_id_tutor',
            'id'
        );
    }


}