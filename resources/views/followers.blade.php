
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Waning</title>
    <link href="{{ asset('css/PerfilCSS/followers.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publication.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AR6QwbGn2AlqbUUnwisJg0hDe3zftqPFqhDzOOIyElsQJMjhY929jEVFCZXvRtI0UK_cuNwA3KvAKtAn"></script>

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
                <a href="{{ asset('/messages') }}">
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


        <main class="contenedor-seguidores">
            <section class="seccion-seguidores">
                <!--flechita, seguidores y busqueda-->
                <div class="header-seguidores">
                    <div class="seguidores">
                        <div class="volver-perfil">
                            <a href="{{ asset('/') }}">
                            <button type="button" class="boton-volver">
                                <img src="{{ asset('images/ImgPerfil//hacia-atras.png')}}" alt="">
                            </button>
                            </a>
                            
                        </div>
                        <div class="titulo-siguiendo">
                            <h2 class="titu-Sg">{{$mensaje}}</h2>
                        </div>
                        <div class="cont-seguidor">
                            <input type="text" class="bus-segui" placeholder="Búsqueda">
                            <span class="lupa-imagenSg"><img src="{{ asset('images/ImgPerfil/buscarSg.png') }}" alt=""></span>
                        </div>
                    </div>
                </div>
                
                <div class="distancia">
                    <div></div>
                </div>
                @if(Auth::user())
                            <input  class="oculto" type="hidden">
                        @endif
                <!--Cuenta de los seguidores-->
                <div class="contPrincipal-segui">
                    <div class="cont-segui">
                        <div class="seguidores-3">
                            @foreach($usuarios as $usuario)
                            <div>
                                  <a href="{{ route('profile-user', ['idEncriptado' => $usuario->id_usuarios]) }}" class="linkSegui">
                                <div class="seguidores-1">
                                    <div class="foto-segui">
                                    @if (is_null($usuario->foto_perfil))
                                        <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" >
                                    @else
                                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="">
                                    @endif
                                    </div>
                                    <div class="info-segui">
                                        <h2 class="seguir-usuario">{{$usuario->nombre_cuenta}}</h2>
                                        </a>
                                        <div data-usuario= "{{ $usuario->id_usuarios}}" class="seguir">
                                            
                                       
                                            Seguir
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                          
                            
                           
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            @include('commom/mobile')
        </main>
        @include('commom/right-bar')
    </div>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="{{ asset('js/follow.js') }}"></script>
    <script src="{{ asset('js/profileOption.js') }}"></script>
    <script src="{{ asset('js/messageLogin.js') }}"></script>
    <script src="{{ asset('js/convertPremium.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
</body>

</html>