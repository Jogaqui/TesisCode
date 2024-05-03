<footer class="footer">
<div class="container">

  <!-- Footer Content -->
  <div class="footer_content">
    <div class="row">

      <!-- Footer Column - About -->
      <div class="col-lg-3 footer_col">

        <!-- Logo -->
        <div class="logo_container">
          <div class="logo">
            <img src="{{ asset('images/logo-footer.png') }}" width="120" alt="">
            <br><br>
            <span>Unidad de registros<br>académicos</span>
          </div>
        </div>
        
        <p class="footer_about_text">Dependencia orgánica de la Universidad Nacional de Trujillo en la Dirección de Procesos Académicos</p>

      </div>

      <!-- Footer Column - Menu -->
      <div class="col-lg-3 footer_col">
        <div class="footer_column_title">Menú</div>
        <div class="footer_column_content">
          <ul>
            <li class="footer_list_item"><a href="{{ url('welcome') }}">Inicio</a></li>
            <li class="footer_list_item"><a href="{{ url('aboutus') }}">Nosotros</a></li>
            <li class="footer_list_item"><a href="{{ url('unit') }}">Subunidades</a></li>
            <li class="footer_list_item"><a href="{{ url('procedure') }}">Trámites</a></li>
            <li class="footer_list_item"><a href="{{ url('statitics') }}">Estadísticas</a></li>
            
            <li class="footer_list_item"><a href="{{ url('news') }}">Noticias</a></li>
            
            <li class="footer_list_item"><a href="{{ url('contact') }}">Contacto</a></li>
          </ul>
        </div>
      </div>
      <!-- Footer Column - Menu -->
      <div class="col-lg-3 footer_col">
        <div class="footer_column_title">Recursos</div>
        <div class="footer_column_content">
          <ul>
            <li class="footer_list_item"><a href="{{ url('normativas') }}">Normativas</a></li>

            @if (Route::has('login'))
              @auth
              <li class="footer_list_item"><a href="{{ url('home') }}">Intranet</a></li>
              @else
              <li class="footer_list_item"><a href="{{ url('login') }}">Intranet</a></li>
                @if (Route::has('register'))
                <!-- <li class="main_nav_item"><a href="{{ url('register') }}">Registrar</a></li> -->
                @endif
              @endauth
            @endif

            <li class="footer_list_item"><a href="{{ url('formulario_direcciones') }}">Formulario</a></li>
          
           
          </ul>
        </div>
      </div>


      <!-- Footer Column - Contact -->
      <div class="col-lg-3 footer_col">
        <div class="footer_column_title">Contáctanos</div>
        <div class="footer_column_content">
          <ul>
            <li class="footer_contact_item">
              <div class="footer_contact_icon">
                <img src="{{ asset('images/placeholder.svg') }}" alt="Icono">
              </div>
              {{$info -> direccion}}
            </li>
            <li class="footer_contact_item">
              <div class="footer_contact_icon">
                <img src="{{ asset('images/smartphone.svg') }}" alt="Icono">
              </div>
              {{$info -> telefono}}
            </li>
            <li class="footer_contact_item">
              <div class="footer_contact_icon">
                <img src="{{ asset('images/envelope.svg') }}" alt="Icono">
              </div>
              {{$info -> correo}}
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>

  <!-- Footer Copyright -->
  <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
    <div class="footer_copyright">
      <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        &copy; <script>document.write(new Date().getFullYear());</script> Unidad de Registros Académicos, UNT. Todos los derechos reservados
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </span>
    </div>
    <div class="footer_social ml-sm-auto">
      <ul class="menu_social">
        <!-- <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li> -->
        <!-- <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li> -->
        <!-- <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li> -->
        <li class="menu_social_item"><a href="https://www.facebook.com/urauntoficial" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <!-- <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li> -->
      </ul>
    </div>
  </div>

</div>

</footer>
