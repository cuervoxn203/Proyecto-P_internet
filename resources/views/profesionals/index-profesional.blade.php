<!-- Inicio de la Plantilla -->
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Salud Mental</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

    <!-- INCLUIR EL MENU -->
    @include('includes.menu')

    <!-- INICIO DEL CUERPO DE LA TABLA -->
    <div class="container-fluid">
      <h5 class="card-title fw-semibold mb-4">Profesionales</h5>
        <a href="{{ route('profesional.create') }}" type="button" class="btn btn-outline-success m-1">Generar Nuevo Registro</a>
      <div class="card mb-0">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">ID</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nombre</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Email</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Especialidad</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Telefono</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Fecha</h6>
                  </th>
                </tr>
              </thead>
              <!-- FIN DEL CUERPO DE LA TABLA-->

              <!-- DATOS DE LA TABLA -->
              <tbody>
            @foreach($profesionals as $profesional)
            <tr>
                <td>{{ $profesional->id }}</td>
                <td>
                    <a href="{{ route('profesional.show', $profesional) }}">
                        {{ $profesional->nombre }}
                    </a>
                </td>
                <td class="border-bottom-0">{{ $profesional->email }}</td>
                <td class="border-bottom-0">{{ $profesional->especialidad }}</td>
                <td class="border-bottom-0">{{ $profesional->telefono }}</td>
                <td class="border-bottom-0">{{ $profesional->created_at }}</td>
                </td>
            </tr>
            @endforeach
        </tbody>
    <!-- FIN DEL FORMULARIO -->
    <!-- FIN DEL CONTENIDO-->
    </div>
  </div>