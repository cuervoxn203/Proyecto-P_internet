<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Recursos</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
    @include('includes.menu')

    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Lista de Recursos</h5>

        <div class="card mb-4">
            <div class="card-body">
                @can('create', App\Models\Recurso::class)
                    <a href="{{ route('recursos.create') }}" class="btn btn-outline-primary mb-4">Crear Nuevo Recurso</a>
                @endcan
                <ul class="list-group">
                    @foreach ($recursos as $recurso)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>{{ $recurso->titulo }}</strong>
                            <div>
                                <a href="{{ route('recursos.show', $recurso) }}" class="btn btn-outline-info btn-sm">Ver</a>
                                @can('update', $recurso)
                                    <a href="{{ route('recursos.edit', $recurso) }}" class="btn btn-outline-secondary btn-sm">Editar</a>
                                @endcan
                                @can('delete', $recurso)
                                    <form action="{{ route('recursos.destroy', $recurso) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
