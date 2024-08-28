<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cita
 *
 * @property $id
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $notas
 * @property $color
 * @property $estado
 * @property $id_user
 * @property $id_paciente
 * @property $id_servicio
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Paciente $paciente
 * @property Servicio $servicio
 * @property Historiale[] $historiales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cita extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_inicio', 'fecha_fin', 'notas', 'color', 'estado', 'id_user', 'id_paciente', 'id_servicio'];
    protected $dates = ['fecha_inicio', 'fecha_fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class, 'id_paciente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicio()
    {
        return $this->belongsTo(\App\Models\Servicio::class, 'id_servicio', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historiales()
    {
        return $this->hasMany(\App\Models\Historiale::class, 'id', 'id_cita');
    }
    

}
