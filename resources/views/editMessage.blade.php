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
                <a href="/messages">
                    <div class="contenedor itemMenu">  <img src="{{ asset('images/iconos de index/conversacion.png rellenos/') }}" class="icono"> &nbsp; &nbsp;
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
        <main id="perfil__contenido__principal" class="contenedor-perfil">
            <section class="seccion-perfil">
                <!--Header del Perfil-->
                <div class="perfil-usuario-header">
                    <div class="perfil-usuario-portada">
                        <div class="desplejar-menu">
                            <button type="button" id="boton-menu" class="boton-menu">
                                <img src="{{ asset('images/ImgPerfil/desplegar-menu.png')}}" alt="" title="Menu desplegable">
                            </button>
                        </div>
                    </div>

                </div>

    
                <div class="cabecera-chat">

                    <div class="img-usuario">
                        <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" alt="" title="Menu desplegable">
                    </div>

                    <div class="mensaje">
                        <div class="nombre"> Sarai Rodriguez </div>
                    </div>

                </div>

                <div class="cuerpo-chat">

                    <div class="mensajes-yo">

                        <div class="mensaje-yo">
                            Cuerpo mensaje bla bla bla
                        </div>

                    </div>

                    <div class="mensajes-otro">

                        <div class="mensaje-otro">
                            Cuerpo Mensaje
                        </div>

                    </div>

                </div>

                <form class="campos_mensajes">
                        <textarea class="_mensajes" type= "text" placeholder="Escribe un mensaje"></textarea>
                        <input class= "boton_mensajes" type="button" value="Enviar">
                </form>

                
            </section>

            <div class="cuadro">
                

               
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