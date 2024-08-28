<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Historiale
 *
 * @property $id
 * @property $id_paciente
 * @property $id_user
 * @property $id_cita
 * @property $historia_clinica
 * @property $descripcion
 * @property $created_at
 *
 * @property Paciente $paciente
 * @property User $user
 * @property Cita $cita
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Historiale extends Model
{
    public $timestamps = false; 

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_paciente', 'id_user', 'id_cita', 'historia_clinica', 'descripcion'];


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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cita()
    {
        return $this->belongsTo(\App\Models\Cita::class, 'id_cita', 'id');
    }
    

}
