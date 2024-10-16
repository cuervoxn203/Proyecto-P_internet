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

    <!-- Incluir el menú -->
    @include('includes.menu')

    <!-- CONTENIDO DEL PROGRAMA - INICIO -->

    <!-- FORMULARIO -->
    <div class="container-fluid">
      <h5 class="card-title fw-semibold mb-4">Formulario de Registro</h5>
      <div class="card">
        <div class="card-body">
          <form action="{{ route('profesional.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
              <div id="emailHelp" class="form-text">Escribe tu nombre completo</div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
              <div id="emailHelp" class="form-text">Escribe tu correo electronico</div>
            </div>
            <div class="mb-3">
              <label for="especialidad" class="form-label">Especialidad</label>
              <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad') }}" required>
              <div id="emailHelp" class="form-text">Escribe tu especialidad</div>
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Telefono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
              <div id="emailHelp" class="form-text">Escribe tu numero telefonico "MAX 10 Digitos"</div>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
          </form>
        </div>
      </div>
    </div>
    <!-- FIN DEL FORMULARIO -->
    <!-- FIN DEL CONTENIDO-->
    </div>
  </div>
<!-- FIN DEL LA PAGINA-->