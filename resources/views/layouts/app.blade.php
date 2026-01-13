<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('images/logo-icon.png') }}" type="image/png">
  <title>@yield('title','DISWIST')</title>

  <!-- Bootstrap & Icon -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <style>
    #navbar {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 9999;              /* 🔥 PENTING */
      transform: translateY(0);
      transition: transform 0.4s ease;
    }
  </style>
</head>

<body class="d-flex flex-column min-vh-100" style="font-family: 'Quicksand', sans-serif;">

<!-- NAVBAR -->
<nav id="navbar" class="navbar navbar-expand-lg shadow bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('images/logo-full.png') }}" alt="DISWIST" height="40">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div id="navbarNav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('wisata') }}">Wisata</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('hotel') }}">Hotel</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('kuliner') }}">Kuliner</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('paket') }}">Paket</a></li>
        
        @auth
            <li class="nav-item ms-3">
                <a class="btn btn-outline-primary rounded-pill px-4" href="/admin">Dashboard</a>
            </li>
        @else
            <li class="nav-item ms-3">
                <a class="btn btn-primary rounded-pill px-4 text-white" href="{{ route('login') }}">Login</a>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<!-- CONTENT -->
@yield('content')

<!-- FOOTER -->
<footer class="bg-dark text-white py-5 mt-auto">
  <div class="container">
    <p class="mb-0 text-center">© 2026 DISWIST</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ✅ SCROLL SCRIPT (FIXED) -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const navbar = document.getElementById('navbar');

  window.addEventListener('scroll', function () {
    /* 
    if (window.scrollY > 200) {   
      navbar.style.transform = 'translateY(0)';
    } else {
      navbar.style.transform = 'translateY(0)'; // Always visible
    }
    */
  });
});
</script>

@stack('scripts')
</body>
</html>
