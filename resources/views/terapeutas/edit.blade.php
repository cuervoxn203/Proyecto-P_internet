<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Terapeuta</title>
    <!-- Incluye Bootstrap para estilos (opcional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Terapeuta</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> <!-- Muestra el mensaje de error específico -->
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('terapeutas.update', $terapeuta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $terapeuta->nombre) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $terapeuta->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="especialidad" class="form-label">Especialidad:</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad', $terapeuta->especialidad) }}" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $terapeuta->telefono) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Terapeuta</button>
            <a href="{{ route('terapeutas.index') }}" class="btn btn-secondary">Volver a la Lista</a>
        </form>
    </div>
</body>
</html>
