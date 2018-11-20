<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Model\Alumno
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\AnuncioEspecifico[] $anuncios
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Asistencia[] $asistencias
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\EntregaTarea[] $entregaTarea
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Evaluacion[] $evaluaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\GrupoAlumno[] $grupoAlumno
 * @mixin \Eloquent
 * @property int $id
 * @property string $no_control
 * @property string $password
 * @property int $grado
 * @property int $inscripcion_id
 * @property string $nombre
 * @property string $apellidoP
 * @property string $apellidoM
 * @property string $curp
 * @property \Illuminate\Support\Carbon $fecha_nacimiento
 * @property int $edad
 * @property int $meses
 * @property string $calle
 * @property string $no_ext
 * @property string $no_int
 * @property string $colonia
 * @property string $entre_calle1
 * @property string $entre_calle2
 * @property string $cp
 * @property string $punto_referencia
 * @property string $municipio
 * @property string $tel_casa
 * @property string $cel
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereApellidoM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereApellidoP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereCalle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereCel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereColonia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereCp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereCurp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereEdad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereEntreCalle1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereEntreCalle2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereFechaNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereGrado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereInscripcionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereMeses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereMunicipio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereNoControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereNoExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereNoInt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno wherePuntoReferencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereTelCasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereUpdatedAt($value)
 * @property string $estado
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Alumno query()
 */
class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $fillable = [
        'grado',
        'inscripcion_id',
        'nombre',
        'apellidoP',
        'apellidoM',
        'curp',
        'fecha_nacimiento',
        'edad',
        'grado',
        'estado',
        'inscripcion_id',
        'meses',
        'calle',
        'no_ext',
        'no_int',
        'colonia',
        'entre_calle1',
        'entre_calle2',
        'cp',
        'punto_referencia',
        'municipio',
        'tel_casa',
        'cel',
    ];

    public static function rules()
    {
        return
            [
                'nombre' => 'required|max:255',
                'apellidoP' => 'required|max:255',
                'apellidoM' => 'required|max:255',
                'curp' => 'required|max:18|min:18',
                'fecha_nacimiento' => 'date',
                'edad' => 'required|integer',
                'meses' => 'required|integer|max:12',

                'estado' => 'required',
                'calle' => 'required',
                'no_ext' => 'required|integer',
                'colonia' => 'required',
                'entre_calle1' => 'required',
                'entre_calle2' => 'required',
                'cp' => 'required',
                'punto_referencia' => 'required',
                'municipio' => 'required',
                'tel_casa' => 'required',
                'cel' => 'required',
            ];
    }

    public static function messages()
    {
        return
            [
                'nombre.required' => 'El nombre es requerido',
                'nombre.max' => 'Nombre demaciado largo',
                'apellidoP.required' => 'Apellido paterno es requerido',
                'apellidoP.max' => 'Apellido es demaciado largo',
                'apellidoM.required' => 'El apellido materno es requerido',
                'apellidoM.max' => 'El apellido materno es demaciado largo',
                'curp.required' => 'El CURP es requerido',
                'curp.min' => 'Verifique su CURP',
                'curp.max' => 'Verifique su CURP',
                'fecha_nacimiento.date' => 'Ingrese una fecha válida',
                'edad.integer' => 'Ingrese un valor númerico',
                'edad.required' => 'La edad es requerida',
                'meses.required' => 'Este campo es requerido',
                'meses.integer' => 'Ingrese un valor númerico',
                'meses.max' => 'Ingrese un valor entre 1 y 12',

                'estado.required' => 'El estado es requerido',
                'calle.required' => 'La calle es requerida',
                'no_ext.required' => 'El No . Exterior es requerido',
                'no_ext.integer' => 'Ingrese un valor númerico',
                'colonia.required' => 'La colonia es requerida',
                'entre_calle1.required' => 'La calle es requerida',
                'entre_calle2.required' => 'La calle es requerida',
                'cp.required' => 'El código postal es requerido',
                'punto_referencia.required' => 'El punto de referencia es requerido',
                'municipio.required' => 'El municipio es requerido',
                'tel_casa.required' => 'El número es requerido',
                'cel.required' => 'El número es requerido',
            ];
    }

    protected $dateFormat = 'Y-m-d';

    protected $dates = ['fecha_nacimiento'];

    public static function setDateAttribute($value)
    {
        return (new Carbon($value))->format('d/m/y');
    }

    public function evaluaciones()
    {
        return $this->HasMany(
            Evaluacion::class,
            'alumno_id',
            'id'
        );
    }

    public function asistencias()
    {
        return $this->HasMany(
            Asistencia::class,
            'alumno_id',
            'id'
        );
    }

    public function grupoAlumno()
    {
        return $this->hasMany(
            GrupoAlumno::class,
            'alumno_id',
            'id'
        );
    }

    public function entregaTarea()
    {
        return $this->HasMany(
            EntregaTarea::class,
            'alumno_id',
            'id'
        );
    }

    public function anuncios()
    {
        return $this->HasMany(
            AnuncioEspecifico::class,
            'alumno_id',
            'id'
        );
    }

    public function infSalud()
    {
        return $this->HasMany(
            InfSalud::class,
            'alumno_id',
            'id'
        );
    }
}
