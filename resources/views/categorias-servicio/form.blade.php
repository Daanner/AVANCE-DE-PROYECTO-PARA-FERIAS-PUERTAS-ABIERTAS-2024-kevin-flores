<div class="container mt-3">
    <div class="row padding-1 p-1">
        <div class="col-md-12">
            <form method="POST" action="{{ route('categorias-servicios.store') }}">
                @csrf
                <div class="form-group mb-2 mb20">
                    <label for="fecha_creacion" class="form-label">{{ __('Fecha Creacion') }}</label>
                    <input type="datetime-local" name="fecha_creacion" class="form-control @error('fecha_creacion') is-invalid @enderror" value="{{ old('fecha_creacion', $categoriasServicio?->fecha_creacion ? $categoriasServicio->fecha_creacion->format('Y-m-d\TH:i') : '') }}" id="fecha_creacion">
                    {!! $errors->first('fecha_creacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="fecha_actualizacion" class="form-label">{{ __('Fecha Actualizacion') }}</label>
                    <input type="datetime-local" name="fecha_actualizacion" class="form-control @error('fecha_actualizacion') is-invalid @enderror" value="{{ old('fecha_actualizacion', $categoriasServicio?->fecha_actualizacion ? $categoriasServicio->fecha_actualizacion->format('Y-m-d\TH:i') : '') }}" id="fecha_actualizacion">
                    {!! $errors->first('fecha_actualizacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $categoriasServicio?->nombre) }}" id="nombre" placeholder="Nombre">
                    {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
                    <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $categoriasServicio?->descripcion) }}" id="descripcion" placeholder="Descripcion">
                    {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
