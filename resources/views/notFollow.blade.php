<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Waning</title>
    <link href="{{ asset('css/notSeguidor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publication.css') }}" rel="stylesheet">
    <script src="https://www.paypal.com/sdk/js?client-id=AR6QwbGn2AlqbUUnwisJg0hDe3zftqPFqhDzOOIyElsQJMjhY929jEVFCZXvRtI0UK_cuNwA3KvAKtAn"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
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
                    <div class="contenedor itemMenuSeleccionado"> <img src="{{ asset('images/iconos de index/iconos rellenos/notificaciones-relleno.png') }}" class="icono"> &nbsp;
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


        <main class="contenedor-seguir">
            <section class="seccion-seguir">

                <!--Header, opciones me gusta y siguiendo-->
                <div class="gustas-siguiendo">
                    <div class="gustas">
                        <a href="{{ asset('/notification')}}">
                        <img src="{{ asset('images/iconos de index/iconos rellenos/corazon-notificacion.png') }}" alt="">
                        </a>
                        
                    </div>
                    <div class="siguiendo">
                        <a href="{{ asset('/notification-follow')}}">
                        <img src="{{ asset('images/iconos de index/iconos rellenos/usuario-notificacion.png') }}" alt="">
                        </a>
                        </div>
                </div>

                <div class="distancia"></div>

                <!--Contenedor de las notificaciones-->
                <div class="cont-notSeguir">
                    <div class="notSeguir">
                    @foreach($notificaciones as $notificacion)
                        <div class="notifi-seguir">
                        <a href="{{ route('profile-user', ['idEncriptado' => $notificacion->id_usuarios]) }}">
                            <div class="foto">
                            @if(optional($notificacion)->foto_perfil)
                            <img src="{{$notificacion->foto_perfil}}" alt=""  data-parametro="{{$notificacion->id_usuarios}}">
                            @else
                            <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}"  data-parametro="{{$notificacion->id_usuarios}}">
                            
                            @endif
                            
                            </div>
                            </a>
                            <div class="descripcion">
                                <div class="desc-tiempo">7min</div>
                                <div class="desc-usuario">{{$notificacion->nombre_cuenta}} ha comenzado a seguirte</div>
                            </div>
                            
                        </div>
                    @endforeach
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