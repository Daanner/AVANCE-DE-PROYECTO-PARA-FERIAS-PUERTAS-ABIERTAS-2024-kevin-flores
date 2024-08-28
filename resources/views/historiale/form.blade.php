<div class="container-fluid">
        <div class="row padding-1 p-1">
            <div class="col-md-12">
                <form action="{{ $historiale->exists ? route('historiales.update', $historiale->id) : route('historiales.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($historiale->exists)
                        @method('PUT')
                    @endif

                    <div class="form-group mb-2">
                        <label for="id_paciente" class="form-label">{{ __('Id Paciente') }}</label>
                        <select name="id_paciente" class="form-control @error('id_paciente') is-invalid @enderror" id="id_paciente">
                            <option value="">{{ __('Select Paciente') }}</option>
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" {{ old('id_paciente', $historiale->id_paciente) == $paciente->id ? 'selected' : '' }}>
                                    {{ $paciente->nombre }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}
                                </option>
                            @endforeach
                        </select>
                        {!! $errors->first('id_paciente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>

                    <div class="form-group mb-2">
                        <label for="id_user" class="form-label">{{ __('Id User') }}</label>
                        <select name="id_user" class="form-control @error('id_user') is-invalid @enderror" id="id_user">
                            <option value="">{{ __('Select User') }}</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('id_user', $historiale->id_user) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        {!! $errors->first('id_user', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>

                    <div class="form-group mb-2">
                        <label for="id_cita" class="form-label">{{ __('Id Cita') }}</label>
                        <select name="id_cita" class="form-control @error('id_cita') is-invalid @enderror" id="id_cita">
                            <option value="">{{ __('Select Cita') }}</option>
                            @foreach($citas as $cita)
                                <option value="{{ $cita->id }}" {{ old('id_cita', $historiale->id_cita) == $cita->id ? 'selected' : '' }}>
                                    {{ $cita->id }} - {{ $cita->paciente->nombre }} - {{ $cita->paciente->apellido_paterno }}
                                </option>
                            @endforeach
                        </select>
                        {!! $errors->first('id_cita', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>


                    <div class="form-group mb-2">
                        <label for="historia_clinica" class="form-label">{{ __('Historia Clinica') }}</label>
                        <input type="file" name="historia_clinica" class="form-control @error('historia_clinica') is-invalid @enderror" id="historia_clinica">
                        {!! $errors->first('historia_clinica', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        @if($historiale->historia_clinica)
                            <div class="mt-2">
                                <a href="{{ Storage::url($historiale->historia_clinica) }}" target="_blank">Ver Archivo Actual</a>
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
                        <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $historiale->descripcion) }}" id="descripcion" placeholder="Descripcion">
                        {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>

                    <div class="col-md-12 mt20 mt-2">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
