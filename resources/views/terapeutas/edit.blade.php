<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Terapeuta</title>
</head>
<body>
    <h1>Editar Terapeuta</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('terapeutas.update', $terapeuta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $terapeuta->nombre) }}"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $terapeuta->email) }}"><br>

        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" value="{{ old('especialidad', $terapeuta->especialidad) }}"><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $terapeuta->telefono) }}"><br>

        <button type="submit">Actualizar Terapeuta</button>
    </form>
</body>
</html>
