<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Http\Requests\CitaRequest;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Servicio;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;


/**
 * Class CitaController
 * @package App\Http\Controllers
 */
class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::paginate();

        return view('cita.index', compact('citas'))
            ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cita = new Cita();
        $users = User::all(); // Obtener todos los usuarios
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        $servicios = Servicio::all(); // Obtener todos los servicios

        return view('cita.create', compact('cita', 'users', 'pacientes', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la solicitud
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
    
        // Crear una nueva cita
        $cita = new Cita;
        $cita->fecha_inicio = $request->fecha_inicio;
        $cita->fecha_fin = $request->fecha_fin;
        $cita->notas = $request->notas;
        $cita->color = $request->color ?? '#7cbae8';
        $cita->estado = $request->estado;
        $cita->id_user = $request->id_user;
        $cita->id_paciente = $request->id_paciente;
        $cita->id_servicio = $request->id_servicio;
        $cita->save();
    
        // Obtener el nombre del paciente y del usuario
        $paciente = Paciente::find($request->id_paciente);
        $usuario = User::find($request->id_user);
        
        if ($paciente) {
            $pacienteNombre = $paciente->nombre . ' ' . $paciente->apellido_paterno . ' ' . $paciente->apellido_materno;
        } else {
            $pacienteNombre = 'Paciente Desconocido';
        }
        
        $usuarioNombre = $usuario ? $usuario->name : 'Usuario Desconocido';
    
        // Crear el evento
        $event = new Event;
        $event->name = 'Cita con ' . $pacienteNombre . ' (Usuario: ' . $usuarioNombre . ')';
        $event->description = $request->notas;
        $event->startDateTime = Carbon::parse($request->fecha_inicio);
        $event->endDateTime = Carbon::parse($request->fecha_fin);
        $event->save();
    
        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cita = Cita::find($id);

        return view('cita.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cita = Cita::find($id);
        $users = User::all(); // Obtener todos los usuarios
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        $servicios = Servicio::all(); // Obtener todos los servicios

        return view('cita.edit', compact('cita', 'users', 'pacientes', 'servicios'));
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
    
        // Encontrar y actualizar la cita
        $cita = Cita::findOrFail($id);
        $cita->fecha_inicio = $request->fecha_inicio;
        $cita->fecha_fin = $request->fecha_fin;
        $cita->notas = $request->notas;
        $cita->color = $request->color ?? '#7cbae8';
        $cita->estado = $request->estado;
        $cita->id_user = $request->id_user;
        $cita->id_paciente = $request->id_paciente;
        $cita->id_servicio = $request->id_servicio;
        $cita->save();
    
        // Obtener el nombre del paciente y del usuario
        $paciente = Paciente::find($request->id_paciente);
        $usuario = User::find($request->id_user);
        
        if ($paciente) {
            $pacienteNombre = $paciente->nombre . ' ' . $paciente->apellido_paterno . ' ' . $paciente->apellido_materno;
        } else {
            $pacienteNombre = 'Paciente Desconocido';
        }
        
        $usuarioNombre = $usuario ? $usuario->name : 'Usuario Desconocido';
    
        // Actualizar el evento en Google Calendar
        $eventId = $cita->google_calendar_event_id;
    
        if ($eventId) {
            $event = Event::find($eventId);
            if ($event) {
                $event->name = 'Cita con ' . $pacienteNombre . ' (Usuario: ' . $usuarioNombre . ')';
                $event->description = $request->notas;
                $event->startDateTime = Carbon::parse($request->fecha_inicio);
                $event->endDateTime = Carbon::parse($request->fecha_fin);
                $event->save();
            }
        }
    
        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente.');
    }
    
    public function destroy($id)
    {
        Cita::find($id)->delete();

        return redirect()->route('citas.index')
            ->with('success', 'Cita Eliminada successfully');
    }
}
