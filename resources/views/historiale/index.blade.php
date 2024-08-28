@extends('layouts.panel')

@section('template_title')
    Historiales
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Historiales') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('historiales.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                  {{ __('Create New') }}
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
                                        <th>Id Paciente</th>
                                        <th>Id User</th>
                                        <th>Id Cita</th>
                                        <th>Historia Clinica</th>
                                        <th>Descripcion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historiales as $historiale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $historiale->paciente->nombre }}</td>
                                            <td>{{ $historiale->user->name }}  {{ $historiale->paciente->apellido_paterno }} {{ $historiale->paciente->apellido_materno ?? 'N/A' }}</td>
                                            <td>{{ $historiale->id_cita }}</td>
                                            <td>
                                                @if ($historiale->historia_clinica)
                                                    <a href="{{ Storage::url($historiale->historia_clinica) }}" target="_blank">Ver Archivo</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $historiale->descripcion }}</td>
                                            <td>
                                                <form action="{{ route('historiales.destroy', $historiale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('historiales.show', $historiale->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('historiales.edit', $historiale->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $historiales->links() !!}
            </div>
        </div>
    </div>
@endsection
