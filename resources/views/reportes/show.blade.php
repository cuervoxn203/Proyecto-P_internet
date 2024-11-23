@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Reporte</h1>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $reporte->id }}</td>
        </tr>
        <tr>
            <th>Usuario</th>
            <td>{{ $reporte->usuario->name }}</td>
        </tr>
        <tr>
            <th>Datos del Reporte</th>
            <td><pre>{{ json_encode(json_decode($reporte->datos_reporte), JSON_PRETTY_PRINT) }}</pre></td>
        </tr>
        <tr>
            <th>Tipo de Reporte</th>
            <td>{{ $reporte->tipo_reporte }}</td>
        </tr>
        <tr>
            <th>Fecha de Generación</th>
            <td>{{ $reporte->fecha_generacion }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $reporte->descripcion }}</td>
        </tr>
    </table>
    <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
