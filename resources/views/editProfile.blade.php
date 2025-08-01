
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Waning</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publication.css') }}" rel="stylesheet">
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/PerfilCSS/perfil.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/CredeInvalida.css')}}">
    <link href="{{ asset('images/iconos/logopequeño.ico') }}" rel="icon" type="image/ico">
    <script src="https://www.paypal.com/sdk/js?client-id=AR6QwbGn2AlqbUUnwisJg0hDe3zftqPFqhDzOOIyElsQJMjhY929jEVFCZXvRtI0UK_cuNwA3KvAKtAn"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- <script src="{{ asset('js/publicar.js') }}"></script>-->
</head>

<body  onload="init()">
     
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
        <main style=" overflow-y:scroll;"class="principal">
        
            <div class="menuSuperior">
                <button type="button" id="boton-menu" class="boton-menu">
                    <img src="{{ asset('images/ImgPerfil/desplegar-menu.png')}}" alt="" title="Menu desplegable">
                </button>
            </div>
            <h2 class="texto"> Editar Perfil <h2>
            <div class="perfil">
                <form method="POST" action="/editProfile" enctype="multipart/form-data">
                @csrf
                    

                    <div class="imgPerfil" style="display:flex; flex-direction:column;">
                        @if (is_null($usuario->foto_perfil))
                            <img id="imagen-perfil" src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" >
                        @else
                            <img src="{{ Auth::user()->foto_perfil }}"  class="perfil__imagen" alt="">
                            
                        @endif
                            <input type="file" name="archivo" id="archivo" accept="image/*" onchange="mostrarImagenPerfil()">
                            <label id="subir" for="archivo">
                                <img id="icono_subir" src="{{ asset('images/iconos de index/mas.png')}}" alt="">
                            </label>
                    </div>

                    <div class="camposContenedor">
                        <input name="nombre_usuario" type="text" placeholder="Nombre de Usuario" class="campos">
                    </div>

                    <div class="camposContenedor">
                        <input name="nombre_cuenta" type="text" placeholder="Nombre de la Cuenta" class="campos">
                    </div>

                    <div class="camposContenedor">
                       <textarea name="descripcion" type="text" placeholder="Descripción" rows="5" class="campos"></textarea>
                    </div>

                    @if($errors)
                            <div class="Crede-Invalidas">
                                <p>{{ $errors->first() }}</p>
                            </div>
                    @endif

                    <div class="botonesContenedor">
                        <div class="botonesAlineacion">
                            <a class="descartar" href="{{ asset('/profile') }}">
                                <input type="button" value="Descartar" class="boton1">
                            </a>
                           
                            <input type="submit" value="Guardar" class="boton2">
                        </div>
                    </div>

                </form>

            </div>
            @include('commom/mobile')
        </main>
        @include('commom/optionProfile')
        @include('commom/right-bar')
        <script src="{{ asset('js/menuMovil.js') }}"></script>
        <script src="{{ asset('js/publicar.js') }}"></script>
        <script src="{{ asset('js/profileOption.js') }}"></script>
        <script src="{{ asset('js/convertPremium.js') }}"></script>
        <script src="{{ asset('js/alert.js') }}"></script>
</body>

</html>