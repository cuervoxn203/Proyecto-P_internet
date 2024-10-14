<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seleccionar Formulario</title>
</head>
<body>
    <h1>Selecciona un Formulario</h1>

    @if($formularios->isEmpty())
        <p>No hay formularios disponibles en este momento.</p>
    @else
        <ul>
            @foreach ($formularios as $formulario)
            <li>
                <a href="{{ route('formularios.show', $formulario->id) }}">{{ $formulario->nombre }}</a>
                <a href="{{ route('formularios.edit', $formulario->id) }}" style="margin-left: 10px;">(Editar)</a>
            </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('formularios.create') }}" class="btn btn-primary" style="margin-top: 20px;">Añadir nuevo formulario</a>
</body>
</html>
