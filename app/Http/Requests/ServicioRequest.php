<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'duracion' => 'required|integer|min:1',
            'color' => 'nullable|string|size:7', // Asumiendo que el color es un código hexadecimal
            'ubicacion' => 'nullable|string|max:255',
            'tipo_disponibilidad' => 'nullable|string|max:255',
            'id_categoria_servicios' => 'required|exists:categorias_servicios,id', // Asegúrate de que la relación sea correcta
            'fecha_creacion' => 'nullable|date',
            'fecha_actualizacion' => 'nullable|date',
        ];
    }

    /**
     * Get the custom attributes for the validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nombre' => 'nombre del servicio',
            'descripcion' => 'descripción del servicio',
            'precio' => 'precio del servicio',
            'duracion' => 'duración del servicio',
            'color' => 'color del servicio',
            'ubicacion' => 'ubicación del servicio',
            'tipo_disponibilidad' => 'tipo de disponibilidad',
            'id_categoria_servicios' => 'categoría del servicio',
            'fecha_creacion' => 'fecha de creación',
            'fecha_actualizacion' => 'fecha de actualización',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del servicio es obligatorio.',
            'precio.required' => 'El precio del servicio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'duracion.required' => 'La duración del servicio es obligatoria.',
            'duracion.integer' => 'La duración debe ser un número entero.',
            'id_categoria_servicios.exists' => 'La categoría seleccionada no es válida.',
        ];
    }
}
