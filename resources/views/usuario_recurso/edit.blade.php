<!-- Inicio de la Plantilla -->
@extends('layouts.main')

@section('title', 'Editar Usuario Recurso')

@section('content')
    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Editar Usuario Recurso</h5>
        <div class="card">
            <div class="card-body">
                <!-- Formulario para editar el usuario recurso -->
                <form action="{{ route('usuario_recursos.update', $usuarioRecurso->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Método PUT para la actualización -->

                    <!-- Fecha y Hora del Último Acceso -->
                    <div class="mb-3">
                        <label for="ultimo_acceso" class="form-label">Último Acceso</label>
                        <input type="datetime-local" class="form-control" id="ultimo_acceso" name="ultimo_acceso" value="{{ \Carbon\Carbon::parse($usuarioRecurso->ultimo_acceso)->format('Y-m-d\TH:i') }}" required>
                    </div>

                    <!-- Botón para guardar el usuario recurso -->
                    <button type="submit" class="btn btn-primary">Actualizar Usuario Recurso</button>
                </form>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
@endsection
