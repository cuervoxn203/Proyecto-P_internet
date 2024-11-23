@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reporte</h1>
    <form action="{{ route('reportes.update', $reporte) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_usuario">Usuario</label>
            <select name="id_usuario" id="id_usuario" class="form-control" required>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $usuario->id == $reporte->id_usuario ? 'selected' : '' }}>
                        {{ $usuario->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="datos_reporte">Datos del Reporte (JSON)</label>
            <textarea name="datos_reporte" id="datos_reporte" class="form-control" rows="4" required>{{ $reporte->datos_reporte }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="tipo_reporte">Tipo de Reporte</label>
            <input type="text" name="tipo_reporte" id="tipo_reporte" class="form-control" value="{{ $reporte->tipo_reporte }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="fecha_generacion">Fecha de Generación</label>
            <input type="datetime-local" name="fecha_generacion" id="fecha_generacion" class="form-control" 
                   value="{{ \Carbon\Carbon::parse($reporte->fecha_generacion)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ $reporte->descripcion }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Reporte</button>
    </form>
</div>
@endsection
