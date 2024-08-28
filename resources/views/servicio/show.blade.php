@extends('layouts.panel')

@section('template_title')
    {{ $servicio->name ?? __('Show') . " " . __('Servicio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('servicios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Creacion:</strong>
                            {{ $servicio->fecha_creacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Actualizacion:</strong>
                            {{ $servicio->fecha_actualizacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $servicio->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Duracion:</strong>
                            {{ $servicio->duracion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Precio:</strong>
                            {{ $servicio->precio }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Descripcion:</strong>
                            {{ $servicio->descripcion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Color:</strong>
                            {{ $servicio->color }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Ubicacion:</strong>
                            {{ $servicio->ubicacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Tipo Disponibilidad:</strong>
                            {{ $servicio->tipo_disponibilidad }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Id Categoria Servicios:</strong>
                            {{ $servicio->id_categoria_servicios }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
