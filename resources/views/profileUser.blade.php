
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Waning perfil</title>
    <link href="{{ asset('css/PerfilCSS/profileUser.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publication.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/normalize.css') }}">
    
    <link href="{{ asset('images/iconos/logopequeño.ico') }}" rel="icon" type="image/ico">
</head>

<body>
    @include('commom/header')
    <div class="contenedor caja">
    <nav class="navegacion">
            <div class="menu_arriba">
                <a href="/">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/casa.png') }}" class="icono">
                        &nbsp; &nbsp; Inicio  
                    </div>
                </a>
                <a href="/profile">
                    <div class="contenedor itemMenuSeleccionado">
                         <img src="{{ asset('images/iconos de index/iconos rellenos/usuario-relleno.png') }}" class="icono"> &nbsp; &nbsp;
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

        <main id="perfil_principal" class="contenedor-perfil">
            <section class="seccion-perfil">
                <!--Header del Perfil-->
                <div class="perfil-usuario-header">
                    <div class="perfil-usuario-portada">
                            <div class="foto-perfil">
                                <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" title="foto de perfil">
                            </div>
                    </div>
                </div>
                <div class="informacion">
                    <div class="informacion-perfil">
                        <h3 class="titulo">{{$usuario->nombre_cuenta}}</h3>
                        <p class="texto">{{$usuario->descripcion}}</p>
                    </div>
                </div>

                <!--Botones de Segrui y Mensaje-->
                <div class="contenedor-SM">
                    <a href="#" class="SM">
                        <div  id="seguir" data-seguido="{{ $valSeguido }}" class="seguir">Seguir
                        @if (Auth::check())
                        <form id="follow-form" action="{{ route('follows') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$usuario->id_usuarios}}" name="id_usuario22">
                            <input type="hidden" value="{{ Auth::user()->id_usuarios }}" name="id_usuario_personal">
                        </form>
                        @endif
                        </div>
                    </a>
                    <a href="#" class="SM">
                        <div class="mensaje">Mensaje</div>
                    </a>
                </div>

                <!--publicaciones, seguidores y siguiendo-->
                <div class="contenedor-PSS">
                    <a href="#" class="estadisticas">
                        <div class="cantidad">{{$numPublicaciones}}</div>
                        <div class="unidad-PSS">Publicaciones</div>
                    </a>
                    <a href="#" class="estadisticas">
                        <div class="cantidad">{{$numSeguidos}}</div>
                        <div class="unidad-PSS">Siguiendo</div>
                    </a>
                    <a href="#" class="estadisticas">
                        <div class="cantidad">{{$numSeguidores}}</div>
                        <div class="unidad-PSS">Seguidores</div>
                    </a>
                </div>

                <!---Fotos Publicadas-->
                <div class="contPrincipal-public">
                    <div class="contenedor-publicaciones">
                        <div class="publicaciones-3">
                            @foreach($publicaciones as $publicacion)
                            <div class="publicacion-1">
                                <img src="{{ asset($publicacion->archivo)}}" alt="Imagen {{ $publicacion->id_publicaciones }}"> 
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            
        </main>
        
        @include('commom/right-bar')
    </div>
    @include('commom/mobile')
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="{{ asset('js/follow.js') }}"></script>
    <script src="{{ asset('js/profileOption.js') }}"></script>
    <script src="{{ asset('js/messageLogin.js') }}"></script>
</body>

</html>