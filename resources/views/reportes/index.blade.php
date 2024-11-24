@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Lista de Reportes</h1>
    <a href="{{ route('reportes.create') }}" class="btn btn-primary">Crear Reporte</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->usuario->name }}</td>
                    <td>{{ $reporte->tipo_reporte }}</td>
                    <td>{{ $reporte->fecha_generacion }}</td>
                    <td>
                        <a href="{{ route('reportes.show', $reporte) }}" class="btn btn-info btn-sm">Ver</a>
                        @can('update', $reporte)
                            <a href="{{ route('reportes.edit', $reporte) }}" class="btn btn-warning btn-sm">Editar</a>
                        @endcan
                        @can('delete', $reporte)
                            <form action="{{ route('reportes.destroy', $reporte) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
