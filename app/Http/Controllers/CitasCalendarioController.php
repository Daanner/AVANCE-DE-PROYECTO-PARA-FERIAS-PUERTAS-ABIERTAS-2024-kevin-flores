<?php

namespace App\Http\Controllers;

use App\Models\CitasCalendario;
use Illuminate\Http\Request;

class CitasCalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        $citas = Cita::whereBetween('fecha_inicio', [$start, $end])->get();

        return response()->json($citas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'notas' => 'nullable|string',
            'color' => 'nullable|string',
            'estado' => 'nullable|string',
            'id_user' => 'nullable|exists:users,id',
            'id_paciente' => 'nullable|exists:pacientes,id',
            'id_servicio' => 'nullable|exists:servicios,id',
        ]);

        $cita = CitasCalendario::create($request->all());
        return response()->json($cita, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'notas' => 'nullable|string',
            'color' => 'nullable|string',
            'estado' => 'nullable|string',
            'id_user' => 'nullable|exists:users,id',
            'id_paciente' => 'nullable|exists:pacientes,id',
            'id_servicio' => 'nullable|exists:servicios,id',
        ]);

        $cita = CitasCalendario::findOrFail($id);
        $cita->update($request->all());

        return response()->json($cita);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CitasCalendario::destroy($id);
        return response()->json(null, 204);
    }
}
