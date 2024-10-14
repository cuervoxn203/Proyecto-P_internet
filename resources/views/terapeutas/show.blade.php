<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Terapeuta</title>
    <!-- Incluye Bootstrap para estilos (opcional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalles del Terapeuta</h1>

        <!-- Tarjeta con los detalles del Terapeuta -->
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $terapeuta->id }}</p>
                <p><strong>Nombre:</strong> {{ $terapeuta->nombre }}</p>
                <p><strong>Email:</strong> {{ $terapeuta->email }}</p>
                <p><strong>Especialidad:</strong> {{ $terapeuta->especialidad }}</p>
                <p><strong>Teléfono:</strong> {{ $terapeuta->telefono }}</p>
            </div>
        </div>

        <!-- Botones de Acción -->
        <a href="{{ route('terapeutas.edit', $terapeuta->id) }}" class="btn btn-primary mt-3">Editar</a>
        <a href="{{ route('terapeutas.index') }}" class="btn btn-secondary mt-3">Volver a la Lista</a>
    </div>
</body>
</html>
