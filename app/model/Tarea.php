<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Tarea
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\EntregaTarea[] $entregaTarea
 * @property-read \App\Model\Grupo $grupo
 * @mixin \Eloquent
 * @property int $id
 * @property int $grupo_id
 * @property string $nombre
 * @property string $descripcion
 * @property string $fecha_entrega
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Tarea whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Tarea whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Tarea whereFechaEntrega($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Tarea whereGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Tarea whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Tarea whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Tarea whereUpdatedAt($value)
 */
class Tarea extends Model
{
    protected $table = 'tareas';
    protected $fillable = [
        'grupo_id',
        'nombre',
        'descripcion',
        'fecha_entrega',
    ];

    public function entregaTarea()
    {
        return $this->hasMany(
            EntregaTarea::class,
            'tarea_id',
            'id'
        );
    }

    public function grupo()
    {
        return $this->belongsTo(
            Grupo::class,
            'grupo_id',
            'id'
        );
    }
}
