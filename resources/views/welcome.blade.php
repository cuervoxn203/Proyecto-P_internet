
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Aplicacion Salud Mental</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Imagenes -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fuentes-->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Vendor CSS -->
<link href="{{ asset('index/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('index/assets/vendor/aos/aos.css') }}" rel="stylesheet">

<!-- CSS -->
<link href="{{ asset('index/assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="" class="logo d-flex align-items-center">
        <h1 class="sitename"></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <i class="mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- MENU -->
    <section id="hero" class="hero section dark-background">

      <img src="{{ asset('/index/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

      <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <a href="{{ route('login') }}" class="btn-get-started">Iniciar Sesion</a>
            <a href="{{ route('register') }}" class="btn-get-started">Registrarse</a>
          </div>
        </div>
      </div>
    </section>
    <!-- FIN MENU -->

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="{{ asset('index/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('index/assets/js/main.js') }}"></script>
</body>
</html>
