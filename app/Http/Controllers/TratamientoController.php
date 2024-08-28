<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use App\Models\User;
use App\Models\Paciente;
use App\Http\Requests\TratamientoRequest;

/**
 * Class TratamientoController
 * @package App\Http\Controllers
 */
class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tratamientos = Tratamiento::with(['paciente', 'user'])->paginate();
    
        return view('tratamiento.index', compact('tratamientos'))
            ->with('i', (request()->input('page', 1) - 1) * $tratamientos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tratamiento = new Tratamiento();
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        $users = User::all(); // Obtener todos los usuarios
        return view('tratamiento.create', compact('tratamiento', 'pacientes', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TratamientoRequest $request)
    {
        Tratamiento::create($request->validated());

        return redirect()->route('tratamientos.index')
            ->with('success', 'Tratamiento created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tratamiento = Tratamiento::find($id);

        return view('tratamiento.show', compact('tratamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tratamiento = Tratamiento::find($id);
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        $users = User::all(); // Obtener todos los usuarios
        return view('tratamiento.edit', compact('tratamiento', 'pacientes', 'users'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TratamientoRequest $request, Tratamiento $tratamiento)
    {
        $tratamiento->update($request->validated());

        return redirect()->route('tratamientos.index')
            ->with('success', 'Tratamiento updated successfully');
    }

    public function destroy($id)
    {
        Tratamiento::find($id)->delete();

        return redirect()->route('tratamientos.index')
            ->with('success', 'Tratamiento deleted successfully');
    }
}
