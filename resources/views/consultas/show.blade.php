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

    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Detalles de la consulta</h5>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Paciente</h5>
                <p class="card-text"><strong>Paciente:</strong> {{ $consulta->paciente }}</p>
                <p class="card-text"><strong>Descripción:</strong> {{ $consulta->descripcion }}</p>
                <p class="card-text"><strong>Fecha:</strong> {{ $consulta->fecha_hora }}</p>
                
                <!-- Detalles del Terapeuta asignado -->
                <h5 class="card-title fw-semibold mb-4">Terapeuta asignado</h5>
                @if($consulta->terapeuta)
                    <p class="card-text"><strong>Nombre:</strong> {{ $consulta->terapeuta->nombre }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $consulta->terapeuta->email }}</p>
                    <p class="card-text"><strong>Especialidad:</strong> {{ $consulta->terapeuta->especialidad }}</p>
                    <p class="card-text"><strong>Teléfono:</strong> {{ $consulta->terapeuta->telefono }}</p>
                @else
                    <p>Esta consulta no tiene un terapeuta asignado.</p>
                @endif

                <!-- Botones para editar y eliminar -->
                <div class="mt-3">
                    <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-warning">Editar Consulta</a>
                    <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta consulta?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar Consulta</button>
                    </form>
                    <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
</body>
</html>