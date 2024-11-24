<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle del Recurso</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
    @include('includes.menu')

    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Detalle del Recurso</h5>

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Título:</strong> {{ $recurso->titulo }}</p>
                <p><strong>Descripción:</strong> {{ $recurso->descripcion }}</p>
                <p><strong>Tipo:</strong> {{ $recurso->tipo }}</p>
                <p><strong>URL:</strong> <a href="{{ $recurso->url }}" target="_blank">{{ $recurso->url }}</a></p>
                <p><strong>Categoría:</strong> {{ $recurso->categoria }}</p>
                <p><strong>Fecha de Creación:</strong> {{ $recurso->fecha_creacion }}</p>

                <a href="{{ route('recursos.index') }}" class="btn btn-outline-secondary">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>
