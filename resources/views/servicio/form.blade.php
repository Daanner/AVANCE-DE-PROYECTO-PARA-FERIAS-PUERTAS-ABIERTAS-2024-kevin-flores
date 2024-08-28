<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ $servicio->id ? __('Edit Servicio') : __('Create Servicio') }}
                        </h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ $servicio->id ? route('servicios.update', $servicio->id) : route('servicios.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if($servicio->id)
                                @method('PUT')
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $servicio->nombre) }}" id="nombre" placeholder="Nombre">
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
                                        <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" placeholder="Descripcion">{{ old('descripcion', $servicio->descripcion) }}</textarea>
                                        @error('descripcion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="precio" class="form-label">{{ __('Precio') }}</label>
                                        <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $servicio->precio) }}" id="precio" placeholder="Precio">
                                        @error('precio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="duracion" class="form-label">{{ __('Duracion (en minutos)') }}</label>
                                        <input type="number" name="duracion" class="form-control @error('duracion') is-invalid @enderror" value="{{ old('duracion', $servicio->duracion) }}" id="duracion" placeholder="Duracion">
                                        @error('duracion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="color" class="form-label">{{ __('Color') }}</label>
                                        <input type="color" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $servicio->color) }}" id="color" placeholder="Color">
                                        @error('color')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="ubicacion" class="form-label">{{ __('Ubicacion') }}</label>
                                        <input type="text" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror" value="{{ old('ubicacion', $servicio->ubicacion) }}" id="ubicacion" placeholder="Ubicacion">
                                        @error('ubicacion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tipo_disponibilidad" class="form-label">{{ __('Tipo Disponibilidad') }}</label>
                                        <input type="text" name="tipo_disponibilidad" class="form-control @error('tipo_disponibilidad') is-invalid @enderror" value="{{ old('tipo_disponibilidad', $servicio->tipo_disponibilidad) }}" id="tipo_disponibilidad" placeholder="Tipo Disponibilidad">
                                        @error('tipo_disponibilidad')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                 
                                    <div class="form-group mb-3">
                                        <label for="id_categoria_servicios" class="form-label">{{ __('Categoria Servicio') }}</label>
                                        <select name="id_categoria_servicios" class="form-control @error('id_categoria_servicios') is-invalid @enderror" id="id_categoria_servicios">
                                            <option value="">{{ __('Seleccione una categoría') }}</option>
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}" {{ old('id_categoria_servicios', $servicio->id_categoria_servicios) == $categoria->id ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_categoria_servicios')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                    <div class="form-group mb-3">
                                        <label for="fecha_creacion" class="form-label">{{ __('Fecha Creacion') }}</label>
                                        <input type="date" name="fecha_creacion" class="form-control @error('fecha_creacion') is-invalid @enderror" value="{{ old('fecha_creacion', $servicio->fecha_creacion) }}" id="fecha_creacion">
                                        @error('fecha_creacion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="fecha_actualizacion" class="form-label">{{ __('Fecha Actualizacion') }}</label>
                                        <input type="date" name="fecha_actualizacion" class="form-control @error('fecha_actualizacion') is-invalid @enderror" value="{{ old('fecha_actualizacion', $servicio->fecha_actualizacion) }}" id="fecha_actualizacion">
                                        @error('fecha_actualizacion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    <a href="{{ route('servicios.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
