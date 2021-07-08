<!-- Archives -->
<div class="sidebar_section">
  <div class="sidebar_section_title">
    <h3>Preguntas frecuentes</h3>
  </div>
  <ul class="sidebar_list">
    @foreach ($unidades as $unidad)

    <li class="sidebar_list_item"><a href="{{route('question.show', $unidad->idUnidad)}}" style="{{ request()->is('question/'.$unidad->idUnidad) ? 'color: #ffb606;' : '' }}">{{ $unidad->descripcion }}</a></li>
    @endforeach
  </ul>
</div>

<!-- Most View Posts -->

<div class="sidebar_section">
  <div class="sidebar_section_title">
    <h3>Publicaciones más vistas</h3>
  </div>

  <div class="latest_posts">

    <!-- Latest Post -->
    @foreach ($mejoresPublicaciones as $post)
    <div class="latest_post">
      <div class="latest_post_image">
        <img src="{{$post->imagen}}" alt="Imagen de las últimas publicaciones">
      </div>
      <div class="latest_post_title"><a href="{{route('welcome.show', $post->idPublicacion)}}">{{$post -> titulo}}</a></div>
      <div class="latest_post_meta">
        <span class="latest_post_author"><a href="{{route('welcome.show', $post->idPublicacion)}}">By {{$post -> creador}}</a></span>
        <span>|</span>
        <span class="latest_post_comments"><a href="{{route('welcome.show', $post->idPublicacion)}}">{{date('Y', strtotime($post -> fecha))}}</a></span>
        <span>|</span>
        <span class="latest_post_comments"><a href="{{route('welcome.show', $post->idPublicacion)}}">{{$post -> vistas}} Vistas</a></span>
      </div>
    </div>
    @endforeach
  </div>

</div>

<!-- Latest Posts -->

<div class="sidebar_section">
  <div class="sidebar_section_title">
    <h3>Últimas publicaciones</h3>
  </div>

  <div class="latest_posts">

    <!-- Latest Post -->
    @foreach ($top as $post)
    <div class="latest_post">
      <div class="latest_post_image">
        <img src="{{$post->imagen}}" alt="Imagen de las últimas publicaciones">
      </div>
      <div class="latest_post_title"><a href="{{route('welcome.show', $post->idPublicacion)}}">{{$post -> titulo}}</a></div>
      <div class="latest_post_meta">
        <span class="latest_post_author"><a href="{{route('welcome.show', $post->idPublicacion)}}">By {{$post -> creador}}</a></span>
        <span>|</span>
        <span class="latest_post_comments"><a href="{{route('welcome.show', $post->idPublicacion)}}">{{date('Y', strtotime($post -> fecha))}}</a></span>
        <span>|</span>
        <span class="latest_post_comments"><a href="{{route('welcome.show', $post->idPublicacion)}}">{{$post -> vistas}} Vistas</a></span>
      </div>
    </div>
    @endforeach
  </div>

</div>

<!-- Tags -->

<div class="sidebar_section">
  <div class="sidebar_section_title">
    <h3>Etiquetas</h3>
  </div>
  <div class="tags d-flex flex-row flex-wrap">
    @foreach ($etiquetas as $tag)
    <div class="tag"><a href="{{route('welcome.showByTag', $tag->idEtiqueta)}}">{{$tag->descripcion}}</a></div>
    @endforeach
  </div>
</div>
