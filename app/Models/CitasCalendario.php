<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitasCalendario extends Model
{
    use HasFactory;

    protected $table = 'citas'; // Asegúrate de que este nombre coincida con tu tabla

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'notas',
        'color',
        'estado',
        'id_user',
        'id_paciente',
        'id_servicio',
    ];

    protected $dates = [
        'fecha_inicio',
        'fecha_fin',
    ];
}
