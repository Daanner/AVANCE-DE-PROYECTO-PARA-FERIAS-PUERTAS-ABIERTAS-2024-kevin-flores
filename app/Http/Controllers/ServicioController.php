<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\CategoriasServicio; // Asegúrate de tener este modelo
use App\Http\Requests\ServicioRequest;

/**
 * Class ServicioController
 * @package App\Http\Controllers
 */
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::with('categoriasServicio')->paginate();

        return view('servicio.index', compact('servicios'))
            ->with('i', (request()->input('page', 1) - 1) * $servicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicio = new Servicio();
        $categorias = CategoriasServicio::all(); // Cargar todas las categorías
        return view('servicio.create', compact('servicio', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicioRequest $request)
    {
        Servicio::create($request->validated());

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $servicio = Servicio::find($id);

        return view('servicio.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $servicio = Servicio::find($id);
        $categorias = CategoriasServicio::all(); // Cargar todas las categorías

        return view('servicio.edit', compact('servicio', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicioRequest $request, Servicio $servicio)
    {
        $servicio->update($request->validated());

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Servicio::find($id)->delete();

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio deleted successfully');
    }
}
