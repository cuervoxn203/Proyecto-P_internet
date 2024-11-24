<!-- Inicio de la Plantilla -->
@extends('layouts.main')

@section('title', 'Crear Usuario Recurso')

@section('content')
    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Asignar Recurso a Usuario</h5>
        <div class="card">
            <div class="card-body">
                <!-- Formulario para crear una nueva asignación de recurso a usuario -->
                <form action="{{ route('usuario_recursos.store') }}" method="POST">
                    @csrf

                    <!-- Campo oculto para el ID del usuario autenticado -->
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <!-- Desplegable para seleccionar Recurso -->
                    <div class="mb-3 form">
                        <label for="recurso_id" class="form-label">Seleccionar Recurso</label>
                        <select class="form-select" id="recurso_id" name="recurso_id" required>
                            <option value="">Seleccione un Recurso</option>
                            @foreach($recursos as $recurso)
                                <option value="{{ $recurso->id }}">{{ $recurso->titulo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fecha y Hora del Último Acceso -->
                    <div class="mb-3">
                        <label for="ultimo_acceso" class="form-label">Fecha y Hora del Último Acceso</label>
                        <input type="datetime-local" class="form-control" id="ultimo_acceso" name="ultimo_acceso" required>
                    </div>

                    <!-- Botón para guardar la asignación -->
                    <button type="submit" class="btn btn-primary">Guardar Asignación</button>
                </form>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
@endsection
