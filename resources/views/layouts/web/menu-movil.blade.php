<div class="menu_container menu_mm">

  <!-- Menu Close Button -->
  <div class="menu_close_container">
    <div class="menu_close"></div>
  </div>

  <!-- Menu Items -->
  <div class="menu_inner menu_mm">
    <div class="menu menu_mm">
      <ul class="menu_list menu_mm">

        <br>
        <li class="menu_item menu_mm"><a href="{{ url('') }}">Inicio</a></li>
        <li id="aboutus" class="menu_item menu_mm"><a href="{{ url('aboutus') }}">Nosotros</a></li>
        <li id="unit" class="menu_item menu_mm"><a href="{{ url('unit') }}">Subunidades</a></li>
        <li id="procedure" class="menu_item menu_mm"><a href="{{ url('procedure') }}">Trámites</a></li>
        <li id="statitics" class="menu_item menu_mm"><a href="{{ url('statitics') }}">Estadísticas</a></li>
        <li id="news" class="menu_item menu_mm"><a href="{{ url('news') }}">Noticias</a></li>
        <li id="contact" class="menu_item menu_mm"><a href="{{ url('contact') }}">Contacto</a></li>

        <br>
        <br>
        <li id="normativas" class="menu_item menu_mm"><a href="{{ url('normativas') }}">Normativas</a></li>
  
        @if (Route::has('login'))
            @auth
              <li id="login" class="menu_item menu_mm"><a href="{{ url('home') }}">Intranet</a></li>
              @else
              <li id="login" class="menu_item menu_mm"><a href="{{ url('login') }}">Intranet</a></li>
                @if (Route::has('register'))
                <!-- <li class="main_nav_item"><a href="{{ url('register') }}">Registrar</a></li> -->
                @endif
            @endauth
        @endif

        <li id="formulario_direcciones" class="menu_item menu_mm"><a href="{{ url('formulario_direcciones') }}">Formulario</a></li>
      </ul>

      <!-- Menu Social -->

      <div class="menu_social_container menu_mm">
        <ul class="menu_social menu_mm">
          {{-- <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li> --}}
          <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
          <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li class="menu_social_item menu_mm"><a href="https://www.facebook.com/urauntoficial"><i class="fab fa-facebook-f"></i></a></li>
          {{-- <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li> --}}
        </ul>
      </div>

      <div class="menu_copyright menu_mm">
        <span> &copy; <script>document.write(new Date().getFullYear());</script> Unidad de Registros Académicos, UNT. Todos los derechos reservados</span>
      </div>
    </div>

  </div>

</div>
