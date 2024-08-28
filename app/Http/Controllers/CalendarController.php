<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index()
    {
        $events = Event::get();
        return view('calendar.index', compact('events'));
    }

    public function create()
    {
        return view('calendar.create');
    }

    
public function store(Request $request)
{
    // Validar las fechas
    $request->validate([
        'name' => 'required|string|max:255',
        'start_datetime' => 'required|date|before:end_datetime',
        'end_datetime' => 'required|date|after:start_datetime',
    ]);

    $event = new Event;

    $event->name = $request->name;
    $event->description = $request->description;
    $event->startDateTime = Carbon::parse($request->start_datetime);
    $event->endDateTime = Carbon::parse($request->end_datetime);

    $event->save();

    return redirect()->route('calendar.index')->with('success', 'Evento creado exitosamente.');
}

    public function edit($id)
    {
        $event = Event::find($id);
        return view('calendar.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $event->name = $request->name;
        $event->description = $request->description;
        $event->startDateTime = Carbon::parse($request->start_datetime);
        $event->endDateTime = Carbon::parse($request->end_datetime);

        $event->save();

        return redirect()->route('calendar.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('calendar.index')->with('success', 'Evento eliminado exitosamente.');
    }
}
