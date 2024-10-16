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

<!--  CUERPO DEL PROGRAMA -->
<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- BARRA LATERAL -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>

        <!-- BARRA DE NAVEGACION - MENUS -->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Inicio</span>
            </li>

            <!-- CATEGORIA -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="referencia a index" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Pagina Principal</span>
              </a>
            </li>

            <!-- CATEGORIA -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Menus</span>
            </li>

            <!-- CATEGORIA -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="introducir pagina referencia" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Menu 1</span>
              </a>
            </li>

            <!-- CATEGORIA -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="introducir pagina referencia" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Menu 2</span>
              </a>
            </li>

            <!-- CATEGORIA -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="introducir pagina referencia" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Menu 3</span>
              </a>
            </li>

            <!-- SUBCATEGORIA -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Plantilla</span>
            </li>

            <!-- CATEGORIA -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Recursos</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- FIN DE LA BARRA DE NAVEGACION LATERAL -->

    <!--  CONTENIDO DEL PROGRAMA -->
    <div class="body-wrapper">

      <!--  CABECERA - PERFIL -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/mapache.jpg" alt="" width="50" height="50" class="rounded-circle" style="object-fit: cover">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Perfil</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">Cuenta</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">Consultas</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Cerrar Sesion</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- FIN DE LA CABECERA - PERFIL -->




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

<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h2>Formulario de Registro</h2>
    <form action="{{ route('profesional.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required><br><br>

        <label for="email">Email: </label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required><br><br>

        <label for="especialidad">Especialidad: </label>
        <input type="text" id="especialidad" name="especialidad" value="{{ old('especialidad') }}" required><br><br>

        <label for="telefono">Teléfono: </label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}"required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html> -->
     