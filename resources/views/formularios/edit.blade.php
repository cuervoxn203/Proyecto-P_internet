<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Formulario</title>
</head>
<body>
    <h1>Editar Formulario</h1>

    <form action="{{ route('formularios.edit', $formulario->id) }}" method="POST" id="form-editar">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="nombre">Nombre del Formulario:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $formulario->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción (opcional):</label>
            <textarea id="descripcion" name="descripcion" class="form-control">{{ $formulario->descripcion }}</textarea>
        </div>

        <h3>Preguntas</h3>
        <div id="preguntas-container">
            @foreach (json_decode($formulario->preguntas) as $index => $pregunta)
            <div class="form-group pregunta-item">
                <label for="pregunta_{{ $index + 1 }}">Pregunta {{ $index + 1 }}:</label>
                <input type="text" name="preguntas[]" id="pregunta_{{ $index + 1 }}" class="form-control" value="{{ $pregunta }}" placeholder="Escribe una pregunta" required>
                <button type="button" class="btn btn-danger btn-eliminar" style="margin-left: 10px;">Eliminar</button>
            </div>
            @endforeach
        </div>

        <button type="button" id="agregar-pregunta" class="btn btn-secondary" style="margin-top: 20px;">Añadir otra pregunta</button>

        <div class="form-group" style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>

    <script src="{{ asset('js/formulario.js') }}"></script>
</body>
</html>
