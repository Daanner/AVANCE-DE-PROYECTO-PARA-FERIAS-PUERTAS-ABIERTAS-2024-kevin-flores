<div class="row padding-1 p-1">
    <div class="col-md-6">
        <div class="form-group mb-2">
            <label for="fecha_inicio" class="form-label">{{ __('Fecha Inicio') }}</label>
            <input type="datetime-local" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio', $cita?->fecha_inicio) }}" id="fecha_inicio">
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2">
            <label for="fecha_fin" class="form-label">{{ __('Fecha Fin') }}</label>
            <input type="datetime-local" name="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror" value="{{ old('fecha_fin', $cita?->fecha_fin) }}" id="fecha_fin">
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2">
            <label for="color" class="form-label">{{ __('Color') }}</label>
            <div id="color" class="d-flex">
                <label class="color-option">
                    <input type="radio" name="color" value="#7cbae8" {{ old('color', $cita?->color) == '#7cbae8' ? 'checked' : '' }}>
                    <span style="background-color: #7cbae8;"></span>
                </label>
                <label class="color-option">
                    <input type="radio" name="color" value="#9ec1ff" {{ old('color', $cita?->color) == '#9ec1ff' ? 'checked' : '' }}>
                    <span style="background-color: #9ec1ff;"></span>
                </label>
                <label class="color-option">
                    <input type="radio" name="color" value="#7cffe8" {{ old('color', $cita?->color) == '#7cffe8' ? 'checked' : '' }}>
                    <span style="background-color: #7cffe8;"></span>
                </label>
                <label class="color-option">
                    <input type="radio" name="color" value="#b3e67c" {{ old('color', $cita?->color) == '#b3e67c' ? 'checked' : '' }}>
                    <span style="background-color: #b3e67c;"></span>
                </label>
                <label class="color-option">
                    <input type="radio" name="color" value="#ffd47c" {{ old('color', $cita?->color) == '#ffd47c' ? 'checked' : '' }}>
                    <span style="background-color: #ffd47c;"></span>
                </label>
                <label class="color-option">
                    <input type="radio" name="color" value="#ffaf7c" {{ old('color', $cita?->color) == '#ffaf7c' ? 'checked' : '' }}>
                    <span style="background-color: #ffaf7c;"></span>
                </label>
                <label class="color-option">
                    <input type="radio" name="color" value="#ff8ea1" {{ old('color', $cita?->color) == '#ff8ea1' ? 'checked' : '' }}>
                    <span style="background-color: #ff8ea1;"></span>
                </label>
                <label class="color-option">
                    <input type="radio" name="color" value="#c88eff" {{ old('color', $cita?->color) == '#c88eff' ? 'checked' : '' }}>
                    <span style="background-color: #c88eff;"></span>
                </label>
                <label class="color-option">
                    <input type="radio" name="color" value="#d3d3d3" {{ old('color', $cita?->color) == '#d3d3d3' ? 'checked' : '' }}>
                    <span style="background-color: #d3d3d3;"></span>
                </label>
            </div>
            {!! $errors->first('color', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
</div>

<style>
.color-option {
    margin-right: 5px;
    position: relative;
}

.color-option input[type="radio"] {
    display: none;
}

.color-option span {
    display: inline-block;
    width: 30px;
    height: 30px;
    border-radius: 4px;
    cursor: pointer;
    border: 2px solid transparent;
}

.color-option input[type="radio"]:checked + span {
    border-color: #000;
}
</style>

        <div class="form-group mb-2">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" class="form-control @error('estado') is-invalid @enderror" id="estado">
                <option value="pendiente" {{ old('estado', $cita?->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmada" {{ old('estado', $cita?->estado) == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                <option value="cancelada" {{ old('estado', $cita?->estado) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-2">
            <label for="notas" class="form-label">{{ __('Notas') }}</label>
            <textarea name="notas" class="form-control @error('notas') is-invalid @enderror" id="notas" placeholder="Notas">{{ old('notas', $cita?->notas) }}</textarea>
            {!! $errors->first('notas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2">
            <label for="id_user" class="form-label">Doctor</label>
            <select name="id_user" class="form-control @error('id_user') is-invalid @enderror" id="id_user">
                <option value="">{{ __('Select User') }}</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('id_user', $cita?->id_user) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_user', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2">
            <label for="id_paciente" class="form-label">Paciente</label>
            <select name="id_paciente" class="form-control @error('id_paciente') is-invalid @enderror" id="id_paciente">
                <option value="">{{ __('Select Paciente') }}</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ old('id_paciente', $cita?->id_paciente) == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nombre }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_paciente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2">
            <label for="id_servicio" class="form-label">Servicio</label>
            <select name="id_servicio" class="form-control @error('id_servicio') is-invalid @enderror" id="id_servicio">
                <option value="">{{ __('Select Servicio') }}</option>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" {{ old('id_servicio', $cita?->id_servicio) == $servicio->id ? 'selected' : '' }}>
                        {{ $servicio->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_servicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
