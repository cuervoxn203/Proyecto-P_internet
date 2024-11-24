<!-- Inicio de la Plantilla -->
@extends('layouts.main')

@section('title', 'Detalles del Usuario Recurso')

@section('content')
    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Detalles del Usuario Recurso</h5>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Usuario</h5>
                <p class="card-text"><strong>Nombre:</strong> {{ $usuarioRecurso->user->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $usuarioRecurso->user->email }}</p>

                <h5 class="card-title fw-semibold mb-4">Recurso</h5>
                <p class="card-text"><strong>Título:</strong> {{ $usuarioRecurso->recurso->titulo }}</p>
                <p class="card-text"><strong>Descripción:</strong> {{ $usuarioRecurso->recurso->descripcion }}</p>

                <h5 class="card-title fw-semibold mb-4">Detalles de la Asignación</h5>
                <p class="card-text"><strong>Fecha y Hora del Último Acceso:</strong> {{ $usuarioRecurso->ultimo_acceso }}</p>

                <!-- Botones para editar y eliminar -->
                <div class="mt-3">
                    @can('update', $usuarioRecurso)
                        <a href="{{ route('usuario_recursos.edit', $usuarioRecurso->id) }}" class="btn btn-warning">Editar Asignación</a>
                    @endcan
                    @can('delete', $usuarioRecurso)
                        <form action="{{ route('usuario_recursos.destroy', $usuarioRecurso->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta asignación?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar Asignación</button>
                        </form>
                    @endcan
                    <a href="{{ route('usuario_recursos.index') }}" class="btn btn-secondary">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
@endsection
