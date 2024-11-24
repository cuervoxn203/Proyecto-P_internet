@extends('layouts.main')

@section('title', 'Lista de Recursos de Usuario')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Lista de Recursos de Usuario</h2>

    @if($recursos === null || $recursos->isEmpty())
        <p>No hay recursos disponibles.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del usuario</th>
                    <th>Titulo del recurso</th>
                    <th>Ultimo Acceso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recursos as $recurso)
                    <tr>
                        <td>{{ $recurso->id }}</td>
                        <td>{{ $recurso->user->name }}</td>
                        <td>{{ $recurso->recurso->titulo }}</td>
                        <td>{{ $recurso->ultimo_acceso }}</td>
                        <td>
                            <a href="{{ route('usuario_recursos.show', $recurso->id) }}" class="btn btn-info btn-sm">Ver</a>
                            @can('update', $recurso)
                                <a href="{{ route('usuario_recursos.edit', $recurso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            @endcan
                            @can('delete', $recurso)
                                <form action="{{ route('usuario_recursos.destroy', $recurso->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este recurso?')">Eliminar</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
