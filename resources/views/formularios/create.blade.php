<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Formulario</title>
</head>
<body>
    <h1>Crear Nuevo Formulario</h1>

    <form action="{{ route('formularios.store') }}" method="POST" id="form-crear">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre del Formulario:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción (opcional):</label>
            <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
        </div>

        <h3>Preguntas</h3>
        <div id="preguntas-container">
            <div class="form-group pregunta-item">
                <label for="pregunta_1">Pregunta 1:</label>
                <input type="text" name="preguntas[]" id="pregunta_1" class="form-control" placeholder="Escribe una pregunta" required>
                <button type="button" class="btn btn-danger btn-eliminar" style="margin-left: 10px;" disabled>Eliminar</button>
            </div>
        </div>

        <button type="button" id="agregar-pregunta" class="btn btn-secondary" style="margin-top: 20px;">Añadir otra pregunta</button>

        <div class="form-group" style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Guardar Formulario</button>
        </div>
    </form>

    <script src="{{ asset('js/formulario.js') }}"></script>
</body>
</html>
