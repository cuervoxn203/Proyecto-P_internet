<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h2>Formulario de Registro</h2>
    <form action="{{ route('profesional.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required><br><br>

        <label for="email">Email: </label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required><br><br>

        <label for="especialidad">Especialidad: </label>
        <input type="text" id="especialidad" name="especialidad" value="{{ old('especialidad') }}" required><br><br>

        <label for="telefono">Teléfono: </label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}"required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>