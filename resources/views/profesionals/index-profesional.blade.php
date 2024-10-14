<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profesionales Index</title>
</head>
<body>
    <h1>Profesional</h1>

    <p>
        <a href="{{ route('profesional.create') }}">Generar Nuevo Registro</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Especialidad</th>
                <th>Telefono</th>
                <th>Fecha de Creacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profesionals as $profesional)
            <tr>
                <td>{{ $profesional->id }}</td>
                <td>
                    <a href="{{ route('profesional.show', $profesional) }}">
                        {{ $profesional->nombre }}
                    </a>
                </td>
                <td>{{ $profesional->email }}</td>
                <td>{{ $profesional->especialidad }}</td>
                <td>{{ $profesional->telefono }}</td>
                <td>{{ $profesional->created_at }}</td>
                <td>{{ $profesional->updated_at }}</td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>