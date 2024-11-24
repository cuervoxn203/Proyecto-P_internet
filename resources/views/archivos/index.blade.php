<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Archivos</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>
<body>
    <!-- Incluir el menú -->
    @include('includes.menu')

    <!-- Contenedor principal -->
    <div class="container-fluid">
        <div class="container-fluid mt-4">
        <h5 class="card-title fw-semibold mb-4">Gestión de Archivos</h5>

        <!-- Formulario para subir archivos -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('archivos.subir') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="archivos" class="form-label">Seleccionar Archivos:</label>
                        <input type="file" name="archivos[]" id="archivos" multiple class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Subir Archivos</button>
                </form>
            </div>
        </div>

        <!-- Mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Lista de archivos -->
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Lista de Archivos</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($archivos as $archivo)
                            <tr>
                                <td>{{ $archivo->nombre_original }}</td>
                                <td>
                                    <a href="{{ route('archivos.descargar', $archivo->id) }}" class="btn btn-success btn-sm">Descargar</a>
                                    <form action="{{ route('archivos.eliminar', $archivo->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No hay archivos subidos.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
