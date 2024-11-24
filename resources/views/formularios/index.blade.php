<!-- Inicio de la Plantilla -->
@extends('layouts.main')

@section('title', 'Formularios')

@section('content')
<div class="container-fluid">
    <h5 class="card-title fw-semibold mb-4">Seleccionar Formulario</h5>

    <div class="card mb-0">
        <div class="card-body">
            @if($formularios->isEmpty())
                <p>No hay formularios disponibles en este momento.</p>
            @else

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">ID</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Acciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formularios as $formulario)
                            <tr>
                                <td>{{ $formulario->id }}</td>
                                <td>
                                    <a href="{{ route('formularios.show', $formulario->id) }}">{{ $formulario->nombre }}</a>
                                </td>
                                <td>
                                    @can('update', $formulario)
                                        <a href="{{ route('formularios.edit', $formulario->id) }}" class="btn btn-warning m-1">Editar</a>
                                    @endcan
                                    <a href="{{ route('respuestas_formularios.create', ['formulario_id' => $formulario->id]) }}" class="btn btn-success m-1">Responder</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            @can('create', App\Models\Formulario::class)
                <a href="{{ route('formularios.create') }}" class="btn btn-outline-success mt-3">Añadir nuevo formulario</a>
            @endcan
        </div>
    </div>
</div>
@endsection
