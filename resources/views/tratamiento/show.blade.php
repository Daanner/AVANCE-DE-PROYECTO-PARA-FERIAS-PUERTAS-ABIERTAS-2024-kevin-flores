@extends('layouts.panel')
@section('template_title')
    {{ $tratamiento->name ?? __('Show') . " " . __('Tratamiento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tratamiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tratamientos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Id Paciente:</strong>
                            {{ $tratamiento->id_paciente }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Id User:</strong>
                            {{ $tratamiento->id_user }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Descripcion:</strong>
                            {{ $tratamiento->descripcion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Inicio:</strong>
                            {{ $tratamiento->fecha_inicio }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Fin:</strong>
                            {{ $tratamiento->fecha_fin }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
