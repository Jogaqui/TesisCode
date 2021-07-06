<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>URA-A | Sitio Web</title>

  <link rel="icon" href="{{ asset('images/logo-icon.png') }}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4/bootstrap.min.css') }}">
  <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  @yield('styles')

</head>
<body>
  <div class="super_container">
    <!-- Header -->
    @include('layouts.web.header')

    <!-- Menu -->
    @include('layouts.web.menu-movil')

    <!-- Content -->
    @yield('contenido')


    <!-- Footer -->
    @include('layouts.web.footer')

  </div>

  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('css/bootstrap4/popper.js') }}"></script>
  <script src="{{ asset('css/bootstrap4/bootstrap.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
  <script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
  <script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
  <script src="{{ asset('plugins/scrollTo/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('plugins/easing/easing.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
