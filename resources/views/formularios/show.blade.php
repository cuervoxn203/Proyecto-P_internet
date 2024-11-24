<!-- Inicio de la Plantilla -->
@extends('layouts.main')

@section('title', 'Formulario: ' . $formulario->nombre)

@section('content')
<div class="container-fluid">
    <h5 class="card-title fw-semibold mb-4">Formulario: {{ $formulario->nombre }}</h5>

    <div class="card mb-4">
        <div class="card-body">
            <!-- Descripción del Formulario -->
            <div class="mb-4">
                <h6 class="fw-bold">Descripción:</h6>
                <p>{{ $formulario->descripcion ?? 'No hay descripción disponible.' }}</p>
            </div>

            <!-- Preguntas del Formulario -->
            <div class="mb-4">
                <h6 class="fw-bold">Preguntas:</h6>
                <ul>
                    @foreach (json_decode($formulario->preguntas) as $index => $pregunta)
                        <li>Pregunta {{ $index + 1 }}: {{ $pregunta }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Acciones -->
            <div class="d-flex">
                @can('update', $formulario)
                    <a href="{{ route('formularios.edit', $formulario->id) }}" class="btn btn-outline-info me-2">Editar Formulario</a>
                @endcan
                <a href="{{ route('formularios.index') }}" class="btn btn-outline-secondary me-2">Volver a la Lista de Formularios</a>
                <!-- Formulario para eliminar -->
                @can('delete', $formulario)
                    <form action="{{ route('formularios.destroy', $formulario->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este formulario?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Eliminar Formulario</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
