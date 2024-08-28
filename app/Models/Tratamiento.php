<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tratamiento
 *
 * @property $id
 * @property $id_paciente
 * @property $id_user
 * @property $descripcion
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $created_at
 *
 * @property Paciente $paciente
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tratamiento extends Model
{
    public $timestamps = false; 

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_paciente', 'id_user', 'descripcion', 'fecha_inicio', 'fecha_fin'];


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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user', 'id');
    }
    

}
