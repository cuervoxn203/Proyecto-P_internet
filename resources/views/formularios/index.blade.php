<!-- Inicio de la Plantilla -->
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salud Mental - Editar Terapeuta</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
    <!-- Incluir el menú -->
    @include('includes.menu')

<!-- INICIO DEL CUERPO DEL CONTENIDO -->
<body>
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
                                        <a href="{{ route('formularios.edit', $formulario->id) }}" class="btn btn-outline-info m-1">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <a href="{{ route('formularios.create') }}" class="btn btn-outline-success mt-3">Añadir nuevo formulario</a>
            </div>
        </div>
    </div>
</body>
</html>