<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Terapeuta</title>
</head>
<body>
    <h1>Crear Terapeuta</h1>

    <!-- Mostrar mensaje de éxito si hay -->
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar errores de validación si hay -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear un terapeuta -->
    <form action="{{ route('terapeutas.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"><br>

        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" value="{{ old('especialidad') }}"><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}"><br>

        <button type="submit">Crear Terapeuta</button>
    </form>
</body>
</html>
