<!-- Inicio de la Plantilla -->
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salud Mental - Editar Terapeuta</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
    <!-- Incluir el menú -->
    @include('includes.menu')

    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <!-- Mostrar las consultas existentes -->
        <h5 class="card-title fw-semibold mb-4">Consultas Existentes</h5>
        <a href="{{ route('consultas.create') }}" class="btn btn-primary mb-3">Generar una nueva consulta</a>
        <div class="card">
            <div class="card-body">
                @if($consultas->isEmpty())
                    <p>No hay consultas registradas aún.</p>
                @else

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Paciente</th>
                                <th>Descripción</th>
                                <th>Fecha y Hora</th>
                                <th>Terapeuta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consultas as $consulta)
                                <tr>
                                    <td>{{ $consulta->id }}</td>
                                    <td>{{ $consulta->paciente }}</td>
                                    <td>{{ $consulta->descripcion }}</td>
                                    <td>{{ $consulta->fecha_hora }}</td>
                                    <td>
                                        <!-- Verificar si la consulta tiene un terapeuta asignado -->
                                        {{ $consulta->terapeuta ? $consulta->terapeuta->nombre : 'Sin asignar' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-success">Ver consulta</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
</body>
</html>