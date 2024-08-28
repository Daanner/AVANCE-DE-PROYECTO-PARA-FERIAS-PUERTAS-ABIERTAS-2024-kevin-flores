@extends('layouts.panel')

@section('template_title')
    {{ $historiale->name ?? __('Show') . " " . __('Historiale') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Historiale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('historiales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Id Paciente:</strong>
                            {{ $historiale->id_paciente }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Id User:</strong>
                            {{ $historiale->id_user }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Id Cita:</strong>
                            {{ $historiale->id_cita }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Historia Clinica:</strong>
                            {{ $historiale->historia_clinica }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Descripcion:</strong>
                            {{ $historiale->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
