@extends('layouts.panel')

@section('template_title')
    Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Servicio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>Fecha Creacion</th>
                                        <th>Fecha Actualizacion</th>
                                        <th>Nombre</th>
                                        <th>Duracion</th>
                                        <th>Precio</th>
                                        <th>Descripcion</th>
                                        <th>Color</th>
                                        <th>Ubicacion</th>
                                        <th>Tipo Disponibilidad</th>
                                        <th>Id Categoria Servicios</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servicios as $servicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $servicio->fecha_creacion }}</td>
                                            <td>{{ $servicio->fecha_actualizacion }}</td>
                                            <td>{{ $servicio->nombre }}</td>
                                            <td>{{ $servicio->duracion }}</td>
                                            <td>{{ $servicio->precio }}</td>
                                            <td>{{ $servicio->descripcion }}</td>
                                            <td>{{ $servicio->color }}</td>
                                            <td>{{ $servicio->ubicacion }}</td>
                                            <td>{{ $servicio->tipo_disponibilidad }}</td>
                                            <td>{{ $servicio->id_categoria_servicios }}</td>
                                            <td>
                                                <form action="{{ route('servicios.destroy',$servicio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('servicios.show',$servicio->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('servicios.edit',$servicio->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $servicios->links() !!}
            </div>
        </div>
    </div>
@endsection
