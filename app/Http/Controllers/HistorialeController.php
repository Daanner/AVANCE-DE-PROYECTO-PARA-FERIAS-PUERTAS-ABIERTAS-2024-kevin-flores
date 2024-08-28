<?php
namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Historiale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistorialeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historiales = Historiale::with(['user', 'paciente', 'cita'])->paginate();

        return view('historiale.index', compact('historiales'))
            ->with('i', (request()->input('page', 1) - 1) * $historiales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $historiale = new Historiale();
        $users = User::all(); 
        $pacientes = Paciente::all(); 
        $citas = Cita::all(); 
        return view('historiale.create', compact('historiale', 'users', 'pacientes', 'citas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_paciente' => 'required|integer',
            'id_user' => 'required|integer',
            'id_cita' => 'required|integer',
            'historia_clinica' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'descripcion' => 'required|string',
        ]);

        $data = $request->except('historia_clinica');

        if ($request->hasFile('historia_clinica')) {
            $file = $request->file('historia_clinica');
            $path = $file->store('historia_clinica');
            $data['historia_clinica'] = $path;
        }

        Historiale::create($data);

        return redirect()->route('historiales.index')
            ->with('success', 'Historiale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $historiale = Historiale::find($id);
        $users = User::all(); // Obtener todos los usuarios si es necesario
        $pacientes = Paciente::all(); // Obtener todos los pacientes si es necesario
        $citas = Cita::all(); // Obtener todas las citas si es necesario
        return view('historiale.show', compact('historiale', 'users', 'pacientes', 'citas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $historiale = Historiale::find($id);
        $users = User::all(); // Obtener todos los usuarios
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        $citas = Cita::all(); // Obtener todas las citas
        return view('historiale.edit', compact('historiale', 'users', 'pacientes', 'citas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Historiale $historiale)
    {
        $request->validate([
            'id_paciente' => 'required|integer',
            'id_user' => 'required|integer',
            'id_cita' => 'required|integer',
            'historia_clinica' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'descripcion' => 'required|string',
        ]);

        $data = $request->except('historia_clinica');

        if ($request->hasFile('historia_clinica')) {
            if ($historiale->historia_clinica) {
                Storage::delete($historiale->historia_clinica);
            }

            $file = $request->file('historia_clinica');
            $path = $file->store('historia_clinica');
            $data['historia_clinica'] = $path;
        }

        $historiale->update($data);

        return redirect()->route('historiales.index')
            ->with('success', 'Historiale updated successfully.');
    }

    public function destroy($id)
    {
        Historiale::find($id)->delete();

        return redirect()->route('historiales.index')
            ->with('success', 'Historiale deleted successfully');
    }
}
