<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Archivos</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
    <!-- Incluir el menú -->
    @include('includes.menu')

    <!-- CONTENIDO DEL PROGRAMA -->
    <div class="container-fluid mt-4">
        <h1 class="card-title fw-semibold mb-4">Listado de Archivos</h1>

        <!-- Mensajes de éxito y error -->
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tabla de usuarios con sus archivos -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">Usuarios y Archivos</h2>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Archivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($user->profile_photo_path)
                                        <a href="{{ asset('storage/' . $user->profile_photo_path) }}" target="_blank" class="btn btn-link">
                                            Ver archivo
                                        </a>
                                    @else
                                        <span class="text-muted">Sin archivo</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->profile_photo_path)
                                        <form method="POST" action="{{ route('files.destroy', $user->id) }}" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este archivo?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    @else
                                        <span class="text-muted">Archivo ya eliminado</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Mostrar los enlaces de paginación -->
                <div class="mt-3">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
</body>

</html>
