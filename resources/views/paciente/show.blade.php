@extends('layouts.panel')

@section('template_title')
    {{ $paciente->name ?? __('Show') . " " . __('Paciente') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Paciente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pacientes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $paciente->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Apellido Paterno:</strong>
                            {{ $paciente->apellido_paterno }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Apellido Materno:</strong>
                            {{ $paciente->apellido_materno }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Genero:</strong>
                            {{ $paciente->genero }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Direccion:</strong>
                            {{ $paciente->direccion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Telefono:</strong>
                            {{ $paciente->telefono }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $paciente->fecha_nacimiento }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Correo:</strong>
                            {{ $paciente->correo }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Contraseña:</strong>
                            {{ $paciente->contraseña }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Verificado Email En:</strong>
                            {{ $paciente->verificado_email_en }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
