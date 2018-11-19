<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Materia
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Evaluacion[] $evaluaciones
 * @mixin \Eloquent
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $detalles
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Materia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Materia whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Materia whereDetalles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Materia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Materia whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Materia whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Materia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Materia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Materia query()
 */
class Materia extends Model
{
    protected $table = 'materias';
    protected $fillable = [
        'nombre',
        'descripcion',
        'detalles',
    ];

    public function evaluaciones()
    {
        return $this->HasMany(
            Evaluacion::class,
            'materia_id',
            'id'
        );
    }
}
