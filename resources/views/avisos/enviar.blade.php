<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salud Mental - Enviar Aviso General</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
    <!-- Incluir el menú -->
    @include('includes.menu')

    <!-- CONTENIDO DEL FORMULARIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Enviar Aviso General</h5>
        <div class="card">
            <div class="card-body">
                <!-- Mensaje de éxito -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Formulario para enviar el aviso -->
                <form action="{{ route('enviar.aviso.general') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título del Aviso</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                        @error('titulo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cuerpo" class="form-label">Cuerpo del Aviso</label>
                        <textarea class="form-control" id="cuerpo" name="cuerpo" rows="6" required>{{ old('cuerpo') }}</textarea>
                        @error('cuerpo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Enviar Aviso</button>
                </form>
            </div>
        </div>
    </div>
    <!-- FIN DEL FORMULARIO -->
</body>

</html>
