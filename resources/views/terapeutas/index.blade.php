<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Terapeutas</title>
    <!-- Puedes incluir Bootstrap para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Terapeutas</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('terapeutas.create') }}" class="btn btn-success mb-3">Crear Nuevo Terapeuta</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Especialidad</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($terapeutas as $terapeuta)
                    <tr>
                        <td>{{ $terapeuta->id }}</td>
                        <td>{{ $terapeuta->nombre }}</td>
                        <td>{{ $terapeuta->email }}</td>
                        <td>{{ $terapeuta->especialidad }}</td>
                        <td>{{ $terapeuta->telefono }}</td>
                        <td>
                            <!-- Botón para ver detalles (si tienes el método show) -->
                            <a href="{{ route('terapeutas.show', $terapeuta->id) }}" class="btn btn-info btn-sm">Ver</a>

                            <!-- Botón para editar -->
                            <a href="{{ route('terapeutas.edit', $terapeuta->id) }}" class="btn btn-primary btn-sm">Editar</a>

                            <!-- Botón para eliminar -->
                            <form action="{{ route('terapeutas.destroy', $terapeuta->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este terapeuta?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
