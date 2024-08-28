@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nuevo Evento</h1>

    <form action="{{ route('calendar.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Evento</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="start_datetime" class="form-label">Fecha y Hora de Inicio</label>
            <input type="datetime-local" class="form-control" id="start_datetime" name="start_datetime" required>
        </div>
        <div class="mb-3">
            <label for="end_datetime" class="form-label">Fecha y Hora de Fin</label>
            <input type="datetime-local" class="form-control" id="end_datetime" name="end_datetime" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar Evento</button>
        <a href="{{ route('calendar.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
