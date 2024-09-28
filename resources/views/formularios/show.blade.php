<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar Formulario</title>
</head>
<body>
    <div class="container">
        <h1>Formulario: {{ $formulario->nombre }}</h1>

        <div class="form-group">
            <h3>Descripción:</h3>
            <p>{{ $formulario->descripcion ?? 'No hay descripción disponible.' }}</p>
        </div>

        <div class="form-group">
            <h3>Preguntas:</h3>
            <ul>
                @foreach (json_decode($formulario->preguntas) as $index => $pregunta)
                    <li>Pregunta {{ $index + 1 }}: {{ $pregunta }}</li>
                @endforeach
            </ul>
        </div>

        <div class="form-group">
            <a href="{{ route('formularios.edit', $formulario->id) }}" class="btn btn-primary">Editar Formulario</a>
            <a href="{{ route('formularios.index') }}" class="btn btn-secondary">Volver a la Lista de Formularios</a>
        </div>

        <form action="{{ route('formularios.destroy', $formulario->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar Formulario</button>
        </form>
    </div>
</body>
</html>
