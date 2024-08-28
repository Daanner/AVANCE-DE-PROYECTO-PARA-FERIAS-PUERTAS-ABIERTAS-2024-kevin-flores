<?php

namespace App\Http\Controllers;

use App\Models\CategoriasServicio;
use App\Http\Requests\CategoriasServicioRequest;

/**
 * Class CategoriasServicioController
 * @package App\Http\Controllers
 */
class CategoriasServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriasServicios = CategoriasServicio::paginate();

        return view('categorias-servicio.index', compact('categoriasServicios'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriasServicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoriasServicio = new CategoriasServicio();
        return view('categorias-servicio.create', compact('categoriasServicio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriasServicioRequest $request)
    {
        CategoriasServicio::create($request->validated());

        return redirect()->route('categorias-servicios.index')
            ->with('success', 'CategoriasServicio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoriasServicio = CategoriasServicio::find($id);

        return view('categorias-servicio.show', compact('categoriasServicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoriasServicio = CategoriasServicio::find($id);

        return view('categorias-servicio.edit', compact('categoriasServicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriasServicioRequest $request, CategoriasServicio $categoriasServicio)
    {
        $categoriasServicio->update($request->validated());

        return redirect()->route('categorias-servicios.index')
            ->with('success', 'CategoriasServicio updated successfully');
    }

    public function destroy($id)
    {
        CategoriasServicio::find($id)->delete();

        return redirect()->route('categorias-servicios.index')
            ->with('success', 'CategoriasServicio deleted successfully');
    }
}
