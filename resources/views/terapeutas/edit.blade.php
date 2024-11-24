<!-- Inicio de la Plantilla -->
@extends('layouts.main')

@section('title', 'Editar Terapeuta')

@section('content')
    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Editar Terapeuta</h5>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('terapeutas.update', $terapeuta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Mostrar errores de validación -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $terapeuta->nombre) }}" required>
                        <div id="nombreHelp" class="form-text">Escribe tu nombre completo</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $terapeuta->email) }}" required>
                        <div id="emailHelp" class="form-text">Escribe tu correo electrónico</div>
                    </div>
                    <div class="mb-3">
                        <label for="especialidad" class="form-label">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad', $terapeuta->especialidad) }}" required>
                        <div id="especialidadHelp" class="form-text">Escribe tu especialidad</div>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $terapeuta->telefono) }}" required>
                        <div id="telefonoHelp" class="form-text">Escribe tu número telefónico "MAX 10 Dígitos"</div>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->

    <!-- Scripts de Bootstrap (si es necesario) -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
@endsection
