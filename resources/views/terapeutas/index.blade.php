<!-- Inicio de la Plantilla -->
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salud Mental - Lista de Terapeutas</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <script>
        function confirmDelete(event) {
            if (!confirm("¿Estás seguro de que deseas eliminar este terapeuta?")) {
                event.preventDefault(); // Previene el envío del formulario si el usuario cancela
            }
        }
    </script>
</head>

<body>
    <!-- Incluir el menú -->
    @include('includes.menu')

    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Lista de Terapeutas</h5>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('terapeutas.create') }}" class="btn btn-primary mb-3">Agregar Terapeuta</a>
                
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table">
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
                                    <a href="{{ route('terapeutas.show', $terapeuta->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('terapeutas.edit', $terapeuta->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('terapeutas.destroy', $terapeuta->id) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event);">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
</body>
</html>
