<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * App\Model\Docente
 *
 * @property-read \App\Model\Grupo $grupo
 * @mixin \Eloquent
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $nombre
 * @property string $apellidoP
 * @property string $apellidoM
 * @property int $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Docente whereApellidoM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Docente whereApellidoP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Docente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Docente whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Docente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Docente whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Docente wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Docente whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Docente whereUpdatedAt($value)
 * @property-read mixed $is_admin
 * @property-read mixed $is_teacher
 */
class Docente extends Authenticatable
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

    public function getIsAdminAttribute()
    {
        return $this->role == 0;
    }

    public function getIsTeacherAttribute()
    {
        return $this->role == 1;
    }
}
