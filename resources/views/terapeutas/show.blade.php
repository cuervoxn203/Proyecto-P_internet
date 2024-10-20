<!-- Inicio de la Plantilla -->
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salud Mental - Detalle del Terapeuta</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!-- Incluir el menú -->
    @include('includes.menu')

    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Detalles del Terapeuta</h5>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $terapeuta->nombre }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $terapeuta->email }}</p>
                <p class="card-text"><strong>Especialidad:</strong> {{ $terapeuta->especialidad }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $terapeuta->telefono }}</p>
                
                <div class="mt-3">
                    <a href="{{ route('terapeutas.edit', $terapeuta->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('terapeutas.destroy', $terapeuta->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    <a href="{{ route('terapeutas.index') }}" class="btn btn-secondary">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
</body>

</html>
