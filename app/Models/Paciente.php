<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 *
 * @property $id
 * @property $nombre
 * @property $apellido_paterno
 * @property $apellido_materno
 * @property $genero
 * @property $direccion
 * @property $telefono
 * @property $fecha_nacimiento
 * @property $correo
 * @property $contraseña
 * @property $verificado_email_en
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Cita[] $citas
 * @property Historiale[] $historiales
 * @property Tratamiento[] $tratamientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paciente extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'genero', 'direccion', 'telefono', 'fecha_nacimiento', 'correo', 'contraseña', 'verificado_email_en'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function citas()
    {
        return $this->hasMany(\App\Models\Cita::class, 'id', 'id_paciente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historiales()
    {
        return $this->hasMany(\App\Models\Historiale::class, 'id', 'id_paciente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tratamientos()
    {
        return $this->hasMany(\App\Models\Tratamiento::class, 'id', 'id_paciente');
    }
    

}
