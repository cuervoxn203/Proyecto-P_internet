@extends('layouts.main')

@section('title', 'Responder Formulario')

@section('content')
<div class="container mt-4">
    <h2>Responder Formulario: {{ $formulario->nombre }}</h2>

    <form action="{{ route('respuestas_formularios.store') }}" method="POST">
        @csrf
        <input type="hidden" name="formulario_id" value="{{ $formulario->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="fecha" value="{{ now()->toDateString() }}">

        @foreach($preguntas as $index => $pregunta)
            <div class="mb-3">
                <label for="respuesta_{{ $index }}" class="form-label">{{ $pregunta }}</label>
                <input type="text" class="form-control @error('respuestas.' . $index) is-invalid @enderror"
                       name="respuestas[{{ $index }}]" id="respuesta_{{ $index }}"
                       value="{{ old('respuestas.' . $index) }}">

                @error('respuestas.' . $index)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Enviar Respuesta</button>
    </form>
</div>
@endsection
