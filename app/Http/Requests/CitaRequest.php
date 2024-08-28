<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fecha_reserva' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'ubicacion' => 'required|string',
            'notas' => 'nullable|string',
            'color' => 'nullable|string',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
            'no_disponibilidad' => 'nullable|boolean',
            'id_user' => 'required|exists:users,id',
            'id_paciente' => 'required|exists:pacientes,id',
            'id_servicio' => 'required|exists:servicios,id',
        ];
    }
}
