<header class="header d-flex flex-row">


  <div class="header_content d-flex flex-row align-items-center">

    <!-- Logo -->
    <div class="logo_container">
      <div class="logo">
        <img src="{{ asset('images/logo_uraa_2.png') }}" alt="Logo UNT">
        <!-- <span>DIRECCIÓN DE<br>REGISTRO TÉCNICO</span> -->
      </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main_nav_container">
      <div class="main_nav">
        <ul class="main_nav_list">
          <li id="inicio" class="main_nav_item"><a href="{{ url('') }}">Inicio</a></li>
          <li id="aboutus" class="main_nav_item"><a href="{{ url('aboutus') }}">Nosotros</a></li>
          <li id="unit" class="main_nav_item"><a href="{{ url('unit') }}">Subunidades</a></li>
          <li id="procedure" class="main_nav_item"><a href="{{ url('procedure') }}">Trámites</a></li>
          <li id="statitics" class="main_nav_item"><a href="{{ url('statitics') }}">Estadísticas</a></li>
          <li id="news" class="main_nav_item"><a href="{{ url('news') }}">Noticias</a></li>
          
          {{-- @if (Route::has('login'))
                    @auth
                        <li class="main_nav_item"><a href="{{ url('home') }}">Intranet</a></li>
                    @else
                        <li class="main_nav_item"><a href="{{ url('login') }}">Intranet</a></li>

                        @if (Route::has('register'))
                            <!-- <li class="main_nav_item"><a href="{{ url('register') }}">Registrar</a></li> -->
                        @endif
                    @endauth
            @endif --}}
          <!-- <li class="main_nav_item"><a href="{{ url('login') }}">Intranet</a></li> -->
          
          <li id="contact" class="main_nav_item"><a href="{{ url('contact') }}">Contacto</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <!-- Telefono -->
  <div class="header_side d-flex flex-row justify-content-center align-items-center">
    <img src="{{ asset('images/phone-call.svg') }}" alt="">
    <span>{{$info -> telefono}}</span>
  </div>



  <!-- Hamburger -->
  <div class="hamburger_container">
    <i class="fas fa-bars trans_200"></i>
  </div>

</header>
