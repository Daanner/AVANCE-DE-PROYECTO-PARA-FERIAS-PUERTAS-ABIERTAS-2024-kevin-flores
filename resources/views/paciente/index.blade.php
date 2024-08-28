@extends('layouts.panel')

@section('template_title')
    Paciente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Pacientes') }}
                            </span>
                             <div class="float-right">
                                <a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Genero</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Correo</th>
                                        <th>Contraseña</th>
                                        <th>Verificado Email En</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $paciente->nombre }}</td>
                                            <td>{{ $paciente->apellido_paterno }}</td>
                                            <td>{{ $paciente->apellido_materno }}</td>
                                            <td>{{ $paciente->genero }}</td>
                                            <td>{{ $paciente->direccion }}</td>
                                            <td>{{ $paciente->telefono }}</td>
                                            <td>{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}</td>
                                            <td>{{ $paciente->correo }}</td>
                                            <td>{{ $paciente->contraseña }}</td>
                                            <td>{{ $paciente->verificado_email_en ? \Carbon\Carbon::parse($paciente->verificado_email_en)->format('d/m/Y H:i') : 'No verificado' }}</td>
                                            <td>
                                                <form action="{{ route('pacientes.destroy',$paciente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('pacientes.show',$paciente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pacientes.edit',$paciente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pacientes->links() !!}
            </div>
        </div>
    </div>
@endsection