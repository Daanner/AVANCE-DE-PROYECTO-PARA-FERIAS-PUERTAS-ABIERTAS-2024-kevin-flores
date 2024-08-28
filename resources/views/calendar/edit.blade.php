@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Evento</h1>

    <form action="{{ route('calendar.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Evento</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $event->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="start_datetime" class="form-label">Fecha y Hora de Inicio</label>
            <input type="datetime-local" class="form-control" id="start_datetime" name="start_datetime" value="{{ $event->startDateTime->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="mb-3">
            <label for="end_datetime" class="form-label">Fecha y Hora de Fin</label>
            <input type="datetime-local" class="form-control" id="end_datetime" name="end_datetime" value="{{ $event->endDateTime->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Evento</button>
        <a href="{{ route('calendar.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
