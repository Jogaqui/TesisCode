<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>URA | Sitio Web</title>

  <link rel="icon" href="{{ asset('/images/logo-icon.png') }}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap4/bootstrap.min.css') }}">
  <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/spinner.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('/css/general.css') }}">

  <!-- Chatbot -->
  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}

  @yield('styles')


</head>
<body>

   <!-- Spinner -->
  {{-- <div class="loader-section-spinner">
    <div class="col ">
      <div class="row justify-content-center">
        <img src="{{ asset('images/logo-icon.png') }}" style="width: 120px; margin-bottom:18px;" alt="UNT logo">
      </div>
     <br>
      <div class="row justify-content-center">
        <span class="loader-spinner"></span>
      </div>

    </div>
  </div> --}}

  <div class="super_container">
    <!-- Header -->
    @include('layouts.web.header')

    <!-- Menu -->
    @include('layouts.web.menu-movil')

    <!-- Content -->
    @yield('contenido')


    <!-- Footer -->
    {{-- @include('layouts.web.footer') --}}

  </div>

  <!-- Telegram bubble - FIXED -->
  {{-- <div>
    <div class="chatBtn jump">
      <a href = {{ config('app.ura_community_telegram_link') }} target="_blank">
        <img src="{{ asset("images/telegram_icon1.png")}}" alt="">
      </a>
    </div>
  </div> --}}


  <!-- Chatbot -->
  {{-- <script>
    var botmanWidget = {
        aboutText:'URA-A | Sitio web',
        introMessage: 'Hola 🙂, Bienvenido al Sitio Web de la Unidad de Registros Académicos (URAA)',
        placeholderText: 'Escribe una pregunta...',
        mainColor: '#ffb606',
        bubbleBackground:'#ffb606',
        bubbleAvatarUrl: 'images/chatbot-1-logo.png',
        title: 'URA-A | Chatbot'
    };
  </script>
  <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> --}}
  {{-- <script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script> --}}

  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCaptcha_Statitics&render=explicit" async defer></script>


  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCaptcha_FormularioDirecciones&render=explicit" async defer></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('css/bootstrap4/popper.js') }}"></script>
  <script src="{{ asset('css/bootstrap4/bootstrap.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
  <script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
  <script src="{{ asset('plugins/progressbar/progressbar.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
  <script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
  <script src="{{ asset('plugins/scrollTo/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('plugins/easing/easing.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
  <script src="{{ asset('js/elements_custom.js') }}"></script>
  <script src="{{ asset('js/statitics.js') }}"></script>

  @yield('scripts')

</body>
</html>
