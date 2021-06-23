<header class="header d-flex flex-row">
  <div class="header_content d-flex flex-row align-items-center">
    <!-- Logo -->
    <div class="logo_container">
      <div class="logo">
        <img src="images/logo.png" alt="">
        <span>Dirección de<br>Registro Técnico</span>
      </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main_nav_container">
      <div class="main_nav">
        <ul class="main_nav_list">
          <li class="main_nav_item"><a href="{{ url('') }}">Inicio</a></li>
          <li class="main_nav_item"><a href="{{ url('procedure') }}">Trámites</a></li>
          <li class="main_nav_item"><a href="{{ url('unit') }}">Unidades</a></li>
          @if (Route::has('login'))
                    @auth
                        <li class="main_nav_item"><a href="{{ url('home') }}">Intranet</a></li>
                    @else
                        <li class="main_nav_item"><a href="{{ url('login') }}">Intranet</a></li>

                        @if (Route::has('register'))
                            <!-- <li class="main_nav_item"><a href="{{ url('register') }}">Registrar</a></li> -->
                        @endif
                    @endauth
            @endif
          <!-- <li class="main_nav_item"><a href="{{ url('login') }}">Intranet</a></li> -->
          <li class="main_nav_item"><a href="{{ url('aboutus') }}">Conócenos</a></li>
          <li class="main_nav_item"><a href="{{ url('contact') }}">Contáctanos</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="header_side d-flex flex-row justify-content-center align-items-center">
    <img src="images/phone-call.svg" alt="">
    <span>{{$info -> telefono}}</span>
  </div>

  <!-- Hamburger -->
  <div class="hamburger_container">
    <i class="fas fa-bars trans_200"></i>
  </div>

</header>
