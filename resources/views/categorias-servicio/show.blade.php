@extends('layouts.panel')
@section('template_title')
    {{ $categoriasServicio->name ?? __('Show') . " " . __('Categorias Servicio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Categorias Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('categorias-servicios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Creacion:</strong>
                            {{ $categoriasServicio->fecha_creacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Actualizacion:</strong>
                            {{ $categoriasServicio->fecha_actualizacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $categoriasServicio->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Descripcion:</strong>
                            {{ $categoriasServicio->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
