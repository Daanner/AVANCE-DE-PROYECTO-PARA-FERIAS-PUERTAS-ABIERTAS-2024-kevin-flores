@extends('layouts.panel')

@section('template_title')
    {{ $cita->name ?? __('Detalles de la Cita') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 " >{{ __('Detalles de la Cita') }}</h5>
                        <a href="{{ route('citas.index') }}" class="btn btn-light btn-sm">

                        </a>
                    </div>

                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>{{ __('Fecha Inicio:') }}</strong> 
                                <span class="float-right">{{ $cita->fecha_inicio }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('Fecha Fin:') }}</strong> 
                                <span class="float-right">{{ $cita->fecha_fin }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('Notas:') }}</strong> 
                                <span class="float-right">{{ $cita->notas }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('Color:') }}</strong>
                                <span class="float-right">
                                    <span class="badge" style="background-color: {{ $cita->color }};">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('Estado:') }}</strong> 
                                <span class="float-right">{{ $cita->estado }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('Usuario:') }}</strong> 
                                <span class="float-right">N°{{ $cita->id_user }}|{{ $cita->user->name ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('Paciente:') }}</strong> 
                                <span class="float-right">N°{{ $cita->id_paciente }} | {{ $cita->paciente->nombre }} {{ $cita->paciente->apellido_paterno }} {{ $cita->paciente->apellido_materno ?? 'N/A' }} </span>
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('Servicio:') }}</strong> 
                                <span class="float-right">N°{{ $cita->id_servicio }} | {{ $cita->servicio->nombre ?? 'N/A' }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ route('citas.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> {{ __('Volver') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
