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

          <li id="inicio" class="main_nav_item"><a href="">Inicio</a></li>

          <li id="aboutus" class="main_nav_item"><a href="">Nosotros</a></li>

          <li id="unit" class="main_nav_item"><a href="{{ url('unit') }}">Subunidades</a></li>

          <li id="procedure" class="main_nav_item"><a href="">Trámites</a></li>

          <li id="statitics" class="main_nav_item"><a href="">Estadísticas</a></li>

          <li id="news" class="main_nav_item"><a href="">Noticias</a></li>


          <li id="contact" class="main_nav_item"><a href="">Contacto</a></li>

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
