@extends('layouts.main')

@section('title', 'Editar Respuesta')

@section('content')
<div class="container-fluid">
    <div class="container mt-4">
    <h2 class="card-title fw-semibold mb-4">Editar Respuesta: {{ $respuestasFormulario->formulario->nombre }}</h2>

    <form action="{{ route('respuestas_formularios.update', $respuestasFormulario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="formulario_id" value="{{ $respuestasFormulario->formulario_id }}">
        <input type="hidden" name="user_id" value="{{ $respuestasFormulario->user_id }}">
        <input type="hidden" name="fecha" value="{{ $respuestasFormulario->fecha }}">

        @php
            $preguntas = json_decode($respuestasFormulario->formulario->preguntas, true);
            $respuestas = json_decode($respuestasFormulario->respuestas, true);
        @endphp

        @foreach($preguntas as $index => $pregunta)
            <div class="mb-3">
                <label for="respuesta_{{ $index }}" class="form-label">{{ $pregunta }}</label>
                <input type="text" class="form-control @error('respuestas.' . $index) is-invalid @enderror"
                       name="respuestas[{{ $index }}]" id="respuesta_{{ $index }}"
                       value="{{ old('respuestas.' . $index, $respuestas[$index] ?? '') }}">

                @error('respuestas.' . $index)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Actualizar Respuesta</button>
    </form>
</div>
@endsection
