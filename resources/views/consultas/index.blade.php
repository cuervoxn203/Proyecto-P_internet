<!-- Inicio de la Plantilla -->
@extends('layouts.main')

@section('title', 'Consultas')

@section('content')
    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <!-- Mostrar las consultas existentes -->
        <h5 class="card-title fw-semibold mb-4">Consultas Existentes</h5>
        @can('create', App\Models\Consulta::class)
            <a href="{{ route('consultas.create') }}" class="btn btn-primary mb-3">Generar una nueva consulta</a>
        @endcan
        <div class="card">
            <div class="card-body">
                @if($consultas->isEmpty())
                    <p>No hay consultas registradas aún.</p>
                @else

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Paciente</th>
                                <th>Descripción</th>
                                <th>Fecha y Hora</th>
                                <th>Terapeuta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consultas as $consulta)
                                <tr>
                                    <td>{{ $consulta->id }}</td>
                                    <td>{{ $consulta->paciente->name }}</td>
                                    <td>{{ $consulta->descripcion }}</td>
                                    <td>{{ $consulta->fecha_hora }}</td>
                                    <td>
                                        <!-- Verificar si la consulta tiene un terapeuta asignado -->
                                        {{ $consulta->terapeuta ? $consulta->terapeuta->nombre : 'Sin asignar' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-success">Ver consulta</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
@endsection
