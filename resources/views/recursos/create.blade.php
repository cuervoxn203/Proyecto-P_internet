<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Recurso</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
    @include('includes.menu')

    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Crear Nuevo Recurso</h5>

        <div class="card mb-4">
            <div class="card-body">
                <a href="{{ route('recursos.index') }}" class="btn btn-outline-secondary mb-4">Volver a la Lista de Recursos</a>

                <form action="{{ route('recursos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción (opcional):</label>
                        <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <input type="text" id="tipo" name="tipo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">URL:</label>
                        <input type="url" id="url" name="url" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría:</label>
                        <input type="text" id="categoria" name="categoria" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_creacion" class="form-label">Fecha de Creación:</label>
                        <input type="date" id="fecha_creacion" name="fecha_creacion" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Guardar Recurso</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
