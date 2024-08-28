@extends('layouts.panel')
@section('template_title')
    Cita
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cita') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('citas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
                                
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                   
                                        <th>Notas</th>
                                        <th>Color</th>
                                        <th>Estado</th>
                                        <th>Doctor</th> <!-- Cambiado de Id User a User -->
                                        <th>Paciente</th> <!-- Cambiado de Id Paciente a Paciente -->
                                        <th>Servicio</th> <!-- Cambiado de Id Servicio a Servicio -->

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($citas as $cita)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <!-- Formateo de fechas -->
                                       
                                            <td>{{ \Carbon\Carbon::parse($cita->fecha_inicio)->format('d/m/Y H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($cita->fecha_fin)->format('d/m/Y H:i') }}</td>

                                        
                                            <td>{{ $cita->notas }}</td>

                                            <!-- Muestra del color -->
                                            <td>
                                                <span style="display: inline-block; width: 20px; height: 20px; background-color: {{ $cita->color }};"></span>
                                            </td>

                                            <td>{{ $cita->estado }}</td>
                                       

                                            <!-- Mostrar nombres en lugar de IDs -->
                                            <td>{{ $cita->user->name ?? 'N/A' }}</td>
                                            <td>{{ $cita->paciente->nombre }} {{ $cita->paciente->apellido_paterno }} {{ $cita->paciente->apellido_materno ?? 'N/A' }}</td>
                                            <td>{{ $cita->servicio->nombre ?? 'N/A' }}</td>

                                            <td>
                                                <form action="{{ route('citas.destroy',$cita->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('citas.show',$cita->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('citas.edit',$cita->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $citas->links() !!}
            </div>
        </div>
    </div>
@endsection
