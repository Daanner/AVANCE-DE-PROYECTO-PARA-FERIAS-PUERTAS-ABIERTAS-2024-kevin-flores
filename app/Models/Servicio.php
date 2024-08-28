<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $fecha_creacion
 * @property $fecha_actualizacion
 * @property $nombre
 * @property $duracion
 * @property $precio
 * @property $descripcion
 * @property $color
 * @property $ubicacion
 * @property $tipo_disponibilidad
 * @property $id_categoria_servicios
 *
 * @property CategoriasServicio $categoriasServicio
 * @property Cita[] $citas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    public $timestamps = false; 

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_creacion', 'fecha_actualizacion', 'nombre', 'duracion', 'precio', 'descripcion', 'color', 'ubicacion', 'tipo_disponibilidad', 'id_categoria_servicios'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoriasServicio()
    {
        return $this->belongsTo(\App\Models\CategoriasServicio::class, 'id_categoria_servicios', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function citas()
    {
        return $this->hasMany(\App\Models\Cita::class, 'id', 'id_servicio');
    }
    

}
