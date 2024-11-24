@extends('layouts.main')

@section('title', 'Respuestas')

@section('content')
<div class="container-fluid">
    <div class="container mt-4">
    <h5 class="card-title fw-semibold mb-4">Respuestas</h5>
    @if(session('success')) <!-- No funciona? -->
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($respuestas->isEmpty())
        <p>No hay respuestas disponibles.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Formulario</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($respuestas as $respuesta)
                    <tr>
                        <td>{{ $respuesta->id }}</td>
                        <td>{{ $respuesta->formulario->nombre }}</td>
                        <td>{{ $respuesta->user->name }}</td>
                        <td>{{ $respuesta->fecha }}</td>
                        <td>
                            <a href="{{ route('respuestas_formularios.show', $respuesta->id) }}" class="btn btn-info btn-sm">Ver</a>
                            @can('update', $respuesta)
                                <a href="{{ route('respuestas_formularios.edit', $respuesta->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            @endcan
                            @can('delete', $respuesta)
                                <form action="{{ route('respuestas_formularios.destroy', $respuesta->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta respuesta?')">Eliminar</button>
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
