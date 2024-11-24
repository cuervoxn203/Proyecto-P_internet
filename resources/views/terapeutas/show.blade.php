<!-- Inicio de la Plantilla -->
@extends('layouts.main')

@section('title', 'Terapeuta: '.$terapeuta->nombre)

@section('content')
    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Detalles del Terapeuta</h5>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $terapeuta->nombre }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $terapeuta->email }}</p>
                <p class="card-text"><strong>Especialidad:</strong> {{ $terapeuta->especialidad }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $terapeuta->telefono }}</p>

                <div class="mt-3">
                    <a href="{{ route('terapeutas.edit', $terapeuta->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('terapeutas.destroy', $terapeuta->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    <a href="{{ route('terapeutas.index') }}" class="btn btn-secondary">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
@endsection
