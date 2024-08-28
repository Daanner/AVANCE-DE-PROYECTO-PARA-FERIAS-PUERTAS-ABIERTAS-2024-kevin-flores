@extends('layouts.panel')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Google Calendar Events</h1>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 text-end">
        <a href="#" class="btn btn-primary" id="createEventBtn">Crear Evento</a>
    </div>

    <div id="calendar"></div>

    <!-- Modal para crear/editar eventos -->
    <div class="modal fade" id="eventoModal" tabindex="-1" role="dialog" aria-labelledby="eventoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventoModalLabel">Detalles del Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventoForm">
                        <input type="hidden" id="eventId" name="id">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="start">Fecha y Hora de Inicio</label>
                            <input type="datetime-local" class="form-control" id="start" name="start" required>
                        </div>
                        <div class="form-group">
                            <label for="end">Fecha y Hora de Fin</label>
                            <input type="datetime-local" class="form-control" id="end" name="end" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="saveEvent">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de Eventos Existentes -->
    <h2 class="mt-4">Eventos Existentes:</h2>
    <ul class="list-group">
        @foreach($events as $event)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $event->name }}</strong><br>
                    <small>{{ $event->startDateTime->format('d M Y, h:i A') }} - {{ $event->endDateTime->format('d M Y, h:i A') }}</small>
                </div>
                <div>
                    <a href="#" class="btn btn-sm btn-warning editEventBtn" data-id="{{ $event->id }}" data-title="{{ $event->name }}" data-description="{{ $event->description }}" data-start="{{ $event->startDateTime }}" data-end="{{ $event->endDateTime }}">Editar</a>
                    <form action="{{ route('calendar.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid', 'bootstrap' ],
            themeSystem: 'bootstrap',
            editable: true,
            events: @json($events),

            dateClick: function(info) {
                $('#eventoModal').modal('show');
                $('#eventId').val('');
                $('#title').val('');
                $('#descripcion').val('');
                $('#start').val(info.dateStr);
                $('#end').val(info.dateStr);
            },

            eventClick: function(info) {
                $('#eventoModal').modal('show');
                $('#eventId').val(info.event.id);
                $('#title').val(info.event.title);
                $('#descripcion').val(info.event.extendedProps.description || '');
                $('#start').val(info.event.start.toISOString().slice(0, 16));
                $('#end').val(info.event.end.toISOString().slice(0, 16));
            }
        });

        calendar.render();

        document.getElementById('createEventBtn').addEventListener('click', function() {
            $('#eventoModal').modal('show');
            $('#eventId').val('');
            $('#title').val('');
            $('#descripcion').val('');
            $('#start').val('');
            $('#end').val('');
        });

        document.getElementById('saveEvent').addEventListener('click', function() {
            var id = $('#eventId').val();
            var title = $('#title').val();
            var descripcion = $('#descripcion').val();
            var start = $('#start').val();
            var end = $('#end').val();

            var method = id ? 'PUT' : 'POST';
            var url = id ? `/calendar/${id}` : '/calendar';

            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    title: title,
                    descripcion: descripcion,
                    start: start,
                    end: end
                })
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      calendar.refetchEvents();
                      $('#eventoModal').modal('hide');
                  }
              });
        });

        // Edit button click handler
        document.querySelectorAll('.editEventBtn').forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var title = this.getAttribute('data-title');
                var description = this.getAttribute('data-description');
                var start = this.getAttribute('data-start');
                var end = this.getAttribute('data-end');

                $('#eventoModal').modal('show');
                $('#eventId').val(id);
                $('#title').val(title);
                $('#descripcion').val(description);
                $('#start').val(new Date(start).toISOString().slice(0, 16));
                $('#end').val(new Date(end).toISOString().slice(0, 16));
            });
        });
    });
</script>
@endsection
