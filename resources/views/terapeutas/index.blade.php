<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Terapeutas</title>
</head>
<body>
    <h1>Lista de Terapeutas</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
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
                        <!-- Botón para editar -->
                        <a href="{{ route('terapeutas.edit', $terapeuta->id) }}">Editar</a>

                        <!-- Botón para eliminar -->
                        <form action="{{ route('terapeutas.destroy', $terapeuta->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este terapeuta?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
