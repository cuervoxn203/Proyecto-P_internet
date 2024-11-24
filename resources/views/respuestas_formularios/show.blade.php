@extends('layouts.main')

@section('title', 'Detalle de Respuesta')

@section('content')
<div class="container-fluid">
    <h5 class="card-title fw-semibold mb-4">Detalles de la Respuesta</h5>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulario: {{ $respuestasFormulario->formulario->nombre }}</h3>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Usuario:</strong> {{ $respuestasFormulario->user->name }}</p>
            <p class="card-text"><strong>Fecha:</strong> {{ $respuestasFormulario->fecha }}</p>
            <h4 class="card-title fw-semibold mb-4">Respuestas:</h4>
            <ul class="card-text">
                @php
                    $preguntas = json_decode($respuestasFormulario->formulario->preguntas, true);
                    $respuestas = json_decode($respuestasFormulario->respuestas, true);
                @endphp
                @foreach($preguntas as $index => $pregunta)
                    <li><strong>{{ $pregunta }}:</strong> {{ $respuestas[$index] ?? 'No respondida' }}</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('respuestas_formularios.index') }}" class="btn btn-secondary">Volver a la lista</a>
            @can('update', $respuestasFormulario)
                <a href="{{ route('respuestas_formularios.edit', $respuestasFormulario->id) }}" class="btn btn-warning">Editar</a>
            @endcan
            @can('delete', $respuestasFormulario)
                <form action="{{ route('respuestas_formularios.destroy', $respuestasFormulario->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta respuesta?')">Eliminar</button>
                </form>
            @endcan
        </div>
    </div>
</div>
@endsection
