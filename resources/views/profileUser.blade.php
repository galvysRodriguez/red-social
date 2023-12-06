
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <title>Waning perfil</title>
    <link href="{{ asset('css/PerfilCSS/profileUser.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publication.css') }}" rel="stylesheet">
    <script src="https://www.paypal.com/sdk/js?client-id=AR6QwbGn2AlqbUUnwisJg0hDe3zftqPFqhDzOOIyElsQJMjhY929jEVFCZXvRtI0UK_cuNwA3KvAKtAn"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/normalize.css') }}">
    
    <link href="{{ asset('images/iconos/logopequeño.ico') }}" rel="icon" type="image/ico">
</head>

<body>
    @include('commom/header')
    <div class="contenedor caja">
    <nav class="navegacion">
            <div class="menu_arriba">
                <a href="{{ asset('/') }}">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/casa.png') }}" class="icono">
                        &nbsp; &nbsp; Inicio  
                    </div>
                </a>
                <a href="{{ asset('/profile') }}">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/usuario.png') }}" class="icono"> &nbsp; &nbsp;
                     Perfil 
                    </div>
                </a>
                <a href="{{ asset('/notification') }}">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/notificacion.png') }}" class="icono"> &nbsp;
                    &nbsp; Notificaciones 
                    </div>
                </a>
                <a href="{{ asset('/upPublication') }}">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/megafono.png') }}" class="icono"> &nbsp; &nbsp;
                        Publicar 
                    </div>
                </a>
                <a href="{{ asset('/message') }}">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/conversacion.png') }}" class="icono"> &nbsp; &nbsp;
                        Mensajes 
                    </div>
                </a>
                <a href="{{ asset('/save') }}">
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
                            @if (optional($usuario)->foto_perfil)
                                <img src="{{ $usuario->foto_perfil }}" alt="" title="foto de perfil" style="width:100%; height:100%;">
                            @else
                                <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" style="width:100%; height:100%;">
                            @endif
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
                    <a  class="SM">
                        <div  id="seguir" data-usuario= "{{ $usuario->id_usuarios}}"
                        data-seguido="{{ $valSeguido }}" class="seguir">Seguir

                        @if(Auth::user())
                            <input  class="oculto" type="hidden">
                        @endif
                        
                       
                        </div>
                    </a>
                    <a class="SM">
                        <div class="mensaje">Mensaje</div>
                    </a>
                </div>

                <!--publicaciones, seguidores y siguiendo-->
                <div class="contenedor-PSS">
                    <a class="estadisticas">
                        <div id="num-publicaciones" class="cantidad">{{$numPublicaciones}}</div>
                        <div class="unidad-PSS">Publicaciones</div>
                    </a>
                    <a class="estadisticas">
                        <div id="num-seguidos" class="cantidad">{{$numSeguidos}}</div>
                        <div class="unidad-PSS">Siguiendo</div>
                    </a>
                    <a class="estadisticas">
                        <div id="num-seguidores" class="cantidad">{{$numSeguidores}}</div>
                        <div class="unidad-PSS">Seguidores</div>
                    </a>
                </div>

                <!---Fotos Publicadas-->
                <div class="contPrincipal-public">
                    <div class="contenedor-publicaciones">
                        <div class="publicaciones-3">
                            @foreach($publicaciones as $publicacion)
                            <div class="publicacion-1">
                                <img src="{{ asset($publicacion->contenido)}}" alt="Imagen {{ $publicacion->id}}"> 
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
    <script src="{{ asset('js/convertPremium.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
</body>

</html>