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
        <h5 class="card-title fw-semibold mb-4">Generar Consulta</h5>
        <div class="card">
            <div class="card-body">
                <!-- Formulario para crear una nueva consulta -->
                <form action="{{ route('consultas.store') }}" method="POST">
                    @csrf

                    <!-- Desplegable para seleccionar Terapeuta -->
                    <div class="mb-3 form">
                        <label for="terapeuta_id" class="form-label">Seleccionar Terapeuta</label>
                        <select class="form-select" id="terapeuta_id" name="terapeuta_id" required>
                            <option value="">Seleccione un Terapeuta</option>
                            @foreach($terapeutas as $terapeuta)
                                <option value="{{ $terapeuta->id }}">{{ $terapeuta->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nombre del Paciente -->
                    <div class="mb-3">
                        <label for="paciente" class="form-label">Nombre del Paciente</label>
                        <input type="text" class="form-control" id="paciente" name="paciente" required>
                    </div>

                    <!-- Descripción de la Consulta -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                    </div>

                    <!-- Fecha y Hora de la Consulta -->
                    <div class="mb-3">
                        <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                        <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
                    </div>

                    <!-- Botón para guardar la consulta -->
                    <button type="submit" class="btn btn-primary">Guardar Consulta</button>
                </form>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
</body>

</html>

