
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Waning</title>
    <link href="{{ asset('css/PerfilCSS/perfil.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publication.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
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
                    <div class="contenedor itemMenuSeleccionado"> <img src="{{ asset('images/iconos de index/iconos rellenos/conversacion-relleno.png') }}" class="icono"> &nbsp; &nbsp;
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
        <main id="perfil__contenido__principal" class="contenedor-perfil">
            <section class="seccion-perfil">
                <!--Header del Perfil-->
            

                    
                <div style="margin-top:45px; margin-bottom:15px"> 

                     <h1>Mensajes</h1>
                     
                </div>

                
            </section>

            <div class="cuadro">
                
                <div class="contenedor-mensajes" onclick="window.location.assign('/messages/edit')">

                    <div class="img-usuario">
                        <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" alt="" title="Menu desplegable">
                    </div>

                    <div class="mensaje">
                        <div class="nombre"> Sarai Rodriguez </div>
                        <div class="texto"> Hola Puto Mundo </div>
                    </div>

                </div>

                <div class="contenedor-mensajes" onclick="window.location.assign('/messages/edit')">

                    <div class="img-usuario">
                        <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" alt="" title="Menu desplegable">
                    </div>

                    <div class="mensaje">
                        <div class="nombre"> Nicol Rodriguez </div>
                        <div class="texto"> Hola Puto Mundo </div>
                    </div>

                </div>

                <div class="contenedor-mensajes " onclick="window.location.assign('/messages/edit')">

                    <div class="img-usuario">
                        <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" alt="" title="Menu desplegable">
                    </div>

                    <div class="mensaje">
                        <div class="nombre"> El Pepe </div>
                        <div class="texto"> Hola, como vas? </div>
                    </div>

                </div>

                <div class="contenedor-mensajes" onclick="window.location.assign('/messages/edit')">

                    <div class="img-usuario">
                        <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" alt="" title="Menu desplegable">
                    </div>

                    <div class="mensaje">
                        <div class="nombre"> Nicol Rodriguez </div> 
                        <div class="texto"> Hola Puto Mundo </div>
                    </div>

                </div>

                <div class="contenedor-mensajes" onclick="window.location.assign('/messages/edit')">

                    <div class="img-usuario">
                        <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" alt="" title="Menu desplegable">
                    </div>

                    <div class="mensaje">
                        <div class="nombre"> Nicol Rodriguez </div> 
                        <div class="texto"> Hola Puto Mundo </div>
                    </div>

                </div>

               
            </div>
            
        </main>
        @include('commom/right-bar')
    </div>
    @include('commom/optionProfile')
    @include('commom/mobile')
    <script src="{{ asset('js/menuMovil.js') }}"></script>
    <script src="{{ asset('js/profileOption.js') }}"></script>
</body>

</html>