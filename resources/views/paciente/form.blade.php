<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('pacientes.update', $paciente->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $paciente?->nombre) }}" id="nombre" placeholder="Nombre">
                    {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2">
                    <label for="apellido_paterno" class="form-label">{{ __('Apellido Paterno') }}</label>
                    <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno', $paciente?->apellido_paterno) }}" id="apellido_paterno" placeholder="Apellido Paterno">
                    {!! $errors->first('apellido_paterno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2">
                    <label for="apellido_materno" class="form-label">{{ __('Apellido Materno') }}</label>
                    <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno', $paciente?->apellido_materno) }}" id="apellido_materno" placeholder="Apellido Materno">
                    {!! $errors->first('apellido_materno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2">
                    <label for="genero" class="form-label">{{ __('Genero') }}</label>
                    <select name="genero" class="form-control @error('genero') is-invalid @enderror" id="genero">
                        <option value="" disabled {{ old('genero', $paciente?->genero) ? '' : 'selected' }}>Seleccionar Genero</option>
                        <option value="Masculino" {{ old('genero', $paciente?->genero) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Femenino" {{ old('genero', $paciente?->genero) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        <option value="Otro" {{ old('genero', $paciente?->genero) == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                    {!! $errors->first('genero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2">
                    <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
                    <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $paciente?->direccion) }}" id="direccion" placeholder="Direccion">
                    {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2">
                    <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
                    <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $paciente?->telefono) }}" id="telefono" placeholder="Telefono">
                    {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2">
                    <label for="fecha_nacimiento" class="form-label">{{ __('Fecha Nacimiento') }}</label>
                    <input type="date" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" value="{{ old('fecha_nacimiento', $paciente?->fecha_nacimiento) }}" id="fecha_nacimiento">
                    {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2">
                    <label for="correo" class="form-label">{{ __('Correo') }}</label>
                    <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $paciente?->correo) }}" id="correo" placeholder="Correo">
                    {!! $errors->first('correo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2">
                    <label for="contraseña" class="form-label">{{ __('Contraseña') }}</label>
                    <input type="password" name="contraseña" class="form-control @error('contraseña') is-invalid @enderror" value="{{ old('contraseña', $paciente?->contraseña) }}" id="contraseña" placeholder="Contraseña">
                    {!! $errors->first('contraseña', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2">
                    <label for="verificado_email_en" class="form-label">{{ __('Verificado Email En') }}</label>
                    <input type="datetime-local" name="verificado_email_en" class="form-control @error('verificado_email_en') is-invalid @enderror" value="{{ old('verificado_email_en', $paciente?->verificado_email_en) }}" id="verificado_email_en">
                    {!! $errors->first('verificado_email_en', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>