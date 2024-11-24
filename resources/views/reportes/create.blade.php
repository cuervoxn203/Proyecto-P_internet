@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="container">
    <h1>Crear Nuevo Reporte</h1>
    <form action="{{ route('reportes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_usuario">Usuario</label>
            <select name="id_usuario" id="id_usuario" class="form-control" required>
                <option value="">Seleccione un usuario</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="datos_reporte">Datos del Reporte (JSON)</label>
            <textarea name="datos_reporte" id="datos_reporte" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="tipo_reporte">Tipo de Reporte</label>
            <input type="text" name="tipo_reporte" id="tipo_reporte" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="fecha_generacion">Fecha de Generación</label>
            <input type="datetime-local" name="fecha_generacion" id="fecha_generacion" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar Reporte</button>
    </form>
</div>
@endsection
