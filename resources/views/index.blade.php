
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Waning</title>
    <script src="{{ asset('js/splide.min.js') }}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publication.css') }}" rel="stylesheet">
    <link href="{{ asset('css/splide.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/normalize.css') }}">
    <link href="{{ asset('images/iconos/logopequeño.ico') }}" rel="icon" type="image/ico">
</head>

<body>
    @include('commom/header')
    <div class="contenedor caja">
    <nav class="navegacion">
            <div class="menu_arriba">
                <a href="/">
                    <div class="contenedor itemMenuSeleccionado"> 
                        <img src="{{ asset('images/iconos de index/iconos rellenos/casita-relleno.png') }}" class="icono">
                        &nbsp; &nbsp; Inicio  
                    </div>
                </a>
                <a href="/profile">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/usuario.png') }}" class="icono"> &nbsp; &nbsp;
                     Perfil 
                    </div>
                </a>
                <a href="/">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/notificacion.png') }}" class="icono"> &nbsp;
                    &nbsp; Notificaciones 
                    </div>
                </a>
                <a href="/upPublication">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/megafono.png') }}" class="icono"> &nbsp; &nbsp;
                        Publicar 
                    </div>
                </a>
                <a href="/">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/conversacion.png') }}" class="icono"> &nbsp; &nbsp;
                        Mensajes 
                    </div>
                </a>
                <a href="/save">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/guardar-instagram.png') }}" class="icono"> &nbsp; &nbsp;
                        Guardados
                    </div>
                </a> 
            </div>
        </nav>
        @include('commom/profile-content')
        <main class="principal">
        
            <div class="historia contenedor">
                <div class="splide perfil">
                    <div class="splide__track">
                        <div class="splide__list">
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/mario.png') }}" alt="" class="perfil__imagen" title="tu historia">
                        <label class="texto__historia">Tu historia</label>
                    </div>
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="splide__slide perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                        </div>
                </div>
                    </div>
                </div>
            </div>
            <div class="publicacion contenedor" data-publicaciones="{{ json_encode($publicaciones) }}">
                    <span class="flecha__atras">

                        <img src="{{ asset('images/inicio/flecha atras svg.svg') }}" alt="" class="atras">
                    </span>
                    <span class="flecha__siguiente" >
                        <img src="{{ asset('images/inicio/flecha siguiente svg.svg') }}" alt="" class="siguiente">
                    </span>
                            <div class="publicacion__tarjeta contenedor">
                                <img alt="" class="tarjeta__imagen"
                                    id="tarjeta__anterior">
                            </div>
                            <div class="publicacion__tarjeta contenedor">
                                <img alt="" class="tarjeta__imagen"
                                    id="tarjeta__seleccionada">
                                <img src="{{ asset('images/inicio/like rojo.png') }}" alt="" class="animacion__megusta" id="megusta__encima">
                            </div>
                            <div class="publicacion__tarjeta contenedor">
                                <img alt="" class="tarjeta__imagen"
                                    id="tarjeta__siguiente">
                            </div>
            </div>
            @if (Auth::check())
            <form id="like-form" action="{{ route('likes') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="id_usuario" value="{{ Auth::user()->id_usuarios }}">
                <input type="hidden" id="id_publicacion_hidden" name="id_publicacion">
            </form>
            
            <form id="save-form" action="{{ route('saves') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="id_usuario" value="{{ Auth::user()->id_usuarios }}">
                <input type="hidden" id="id_publicacion_hidden2" name="id_publicacion2">
            </form>
            @endif

            <div class="accion contenedor">
                <div class="accion__opcion contenedor">
                    <img src="{{ asset('images/iconos de index/me-gusta.png') }}" alt="" title="me gusta" class="accion__imagen" id="me-gusta">
                    <img src="{{ asset('images/iconos de index/iconos rellenos/corazon-relleno.png') }}" alt="" title="me gusta" class="accion__imagen" id="me-gusta-relleno">
                    <img src="{{ asset('images/iconos de index/guardar-instagram.png') }}" alt="" title="guardar" class="accion__imagen" id="guardados">
                    <img src="{{ asset('images/iconos de index/iconos rellenos/guardado-relleno.png') }}" alt="" title="guardar" class="accion__imagen" id="guardados-relleno">
                    <img src="{{ asset('images/iconos de index/compartir.png') }}" alt="" title="compartir" class="accion__imagen" id="compartir">
                </div>
            </div>
            <article class="publicacion__descripcion">
                <div class="publicacion__encabezado contenedor">
                    <div class="publicacion__encabezado__izquierda contenedor">
                        <a class="acceder-usuario" href="{{ route('profile-user', ['idEncriptado' => 2]) }}">
                            <img src="{{ asset('images/inicio/modern-architecture-building-in-the-evening.png') }}" alt=""
                                class="perfil__imagen publicacion__perfil">
                            <div class="encabezado__cuenta">
                        </a>
                            <a class="acceder-usuario" href="{{ route('profile-user', ['idEncriptado' => 2]) }}">
                                <p id="publicacion__nombre-cuenta" class="nombre__cuenta"></p>
                                <p id="publicacion__nombre-usuario" class="etiqueta__opaco"></p>
                            </div>
                        </a>
                        


                    </div>
                    <div class="publicacion__encabezado__derecha">
                        <p id="publicacion__fecha" class="etiqueta__opaco"></p>
                    </div>


                </div>
                <div class="contenido__texto">
                    <p class="texto__publicacion">
                    </p>
                    <div class="contenedor publicacion__interaccion">
                        <p id="publicacion__comentario" class="etiqueta__opaco"></p>
                        <p id="publicacion__megusta" class="etiqueta__opaco"></p>
                    </div>
                    
                </div>
            </article>
            @include('commom/mobile')
        </main>
        @include('commom/right-bar')
    </div>
    <script src="{{ asset('js/likes.js') }}"></script>
    <script src="{{ asset('js/changeImages.js') }}"></script>
    <script src="{{ asset('js/slideHistories.js') }}"></script>
    <script src="{{ asset('js/showHistory.js') }}"></script>
    <script src="{{ asset('js/profileOption.js') }}"></script>
    <script src="{{ asset('js/saves.js') }}"></script>
</body>

</html>