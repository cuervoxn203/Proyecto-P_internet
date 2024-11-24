<!--  CUERPO DEL PROGRAMA -->
<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- BARRA LATERAL -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{asset('/assets/images/logos/dark-logo.svg')}}" width="180" alt="" />
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
              <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
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
              <a class="sidebar-link" href="{{ route("terapeutas.index") }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Terapeutas</span>
              </a>
            </li>

            <!-- CATEGORIA -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route("formularios.index") }}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Formularios</span>
              </a>
            </li>

            <!-- CATEGORIA -->
            <li class="sidebar-item">
              <a class="sidebar-link" href={{ route("consultas.index") }} aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Consultas</span>
              </a>
            <li class="sidebar-item">
              <a class="sidebar-link" href={{ route("respuestas_formularios.index") }} aria-expanded="false">
                <span>
                  <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu">Respuestas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href={{ route("archivos.index") }} aria-expanded="false">
                <span>
                  <i class="ti ti-archive"></i>
                </span>
                <span class="hide-menu">Archivos</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href={{ route("usuario_recursos.index") }} aria-expanded="false">
                <span>
                  <i class="ti ti-box"></i>
                </span>
                <span class="hide-menu">Recursos</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href={{ route("reportes.index") }} aria-expanded="false">
                <span>
                  <i class="ti ti-checklist"></i>
                </span>
                <span class="hide-menu">Reportes</span>
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
                  <img src="{{ Auth::user()->profile_photo_url }}" alt="Foto de perfil" width="50" height="50" class="rounded-circle" style="object-fit: cover">       <!-- IMAGEN DE PERFIL -->

                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="{{ route('profile.show') }}" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Perfil</p>
                    </a>                    
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                      @csrf
                      <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">Cerrar Sesión</button>
                  </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- FIN DE LA CABECERA - PERFIL -->

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
