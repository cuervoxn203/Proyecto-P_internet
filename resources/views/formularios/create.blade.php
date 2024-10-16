<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Formulario</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<!-- INCLUIR EL MENU -->
@include('includes.menu')

<!-- INICIO DEL CUERPO DEL CONTENIDO -->
<body>
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Crear Nuevo Formulario</h5>

        <div class="card mb-4">
            <div class="card-body">
                <a href="{{ route('formularios.index') }}" class="btn btn-outline-secondary mb-4">Volver a la Lista de Formularios</a>

                <form action="{{ route('formularios.store') }}" method="POST" id="form-crear">
                    @csrf

                    <!-- Campo de Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Formulario:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>

                    <!-- Campo de Descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción (opcional):</label>
                        <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
                    </div>

                    <!-- Preguntas -->
                    <h6 class="fw-bold mb-3">Preguntas</h6>
                    <div id="preguntas-container">
                        <div class="mb-3 d-flex align-items-center pregunta-item">
                            <input type="text" name="preguntas[]" id="pregunta_1" class="form-control me-2" placeholder="Escribe una pregunta" required>
                            <div>
                                <button type="button" class="btn btn-outline-danger d-block btn-eliminar mt-3">Eliminar</button>
                            </div>
                        </div>
                    </div>

                    <!-- Botón para agregar otra pregunta -->
                    <button type="button" id="agregar-pregunta" class="btn btn-outline-secondary mb-3">Añadir otra pregunta</button>

                    <!-- Botón de Guardar -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-outline-primary">Guardar Formulario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/formulario.js') }}"></script>
</body>
</html>
