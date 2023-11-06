
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Waning</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publication.css') }}" rel="stylesheet">
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
    <link href="{{ asset('images/iconos/logopequeño.ico') }}" rel="icon" type="image/ico">

    <script src="{{ asset('js/publicar.js') }}"></script>
</head>

<body onload="init()">
    
        <form class="fondo" id="publicarFondo" action="/upPublication" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="ventana">

        <div class="publicarContenedor1">
    <img src="{{ asset('images/Iconos/equis.png') }}" width="24" onclick="publicar()">
</div>

<div class="publicarContenedor2" style="height: 40%; margin-top: 3%;">
    <div class="insertarImg">
        <h4> Inserte la Imagen </h4>
        <input type="file" name="archivo" id="archivo" accept="image/*">
    </div>
</div>

<div class="publicarContenedor2" style="height: 20%; margin-top: 1%;">
    <textarea name="descripcion" class="insertarImg" placeholder="Descripcion"></textarea>
</div>

<div class="publicarContenedor2">
    <div class="botonCont">
        <input class="botonPublicar"  type="submit" value="Publicar">
    </div>
</div>

</div>
        </form>
     
    <header class="encabezado contenedor">
        <div class="encabezado__izquierdo contenedor">
            <img src="{{ asset('images/iconos de index/logopequeño.png') }}" alt="" title="logo" class="logo">
            <h1>Waning</h1>
        </div>
        <div class="encabezado__central">
            <div class="central__busqueda contenedor">
                <input type="text" class="buscador" placeholder="Búsqueda">
                <span class="lupa__imagen"><img src="{{ asset('images/inicio/lupa busqueda.svg') }}" alt=""></span>
            </div>
            <div class="central__etiqueta contenedor">
                <div class="etiqueta contenedor">
                    <label class="etiqueta__contenido seleccion">Para ti</label>
                </div>
                <div class="etiqueta contenedor">
                    <label class="etiqueta__contenido">Siguiendo</label>
                </div>
                
            </div>

        </div>
        <div class="encabezado__derecho contenedor">
            <div class="perfil__usuario contenedor" id="usuario__perfil">
                <div class="perfil__usuario__principal">
                @if (Auth::check())
                    <h3>{{ Auth::user()->nombre_cuenta }}</h3>
                @else
                    <h3>Usuario</h3>
                @endif
                    
                </div>
                <img src="{{ asset('images/inicio/mario.png') }}" alt="" title="foto de perfil" class="perfil__imagen perfil__sesion">
                <div class="icono-barra">
                    <img src="{{ asset('images/inicio/barra desplegable.svg') }}" alt="" class="barra__perfil">
                    <div class="contenido__perfil">
                        @guest
                        <a href="/login">Iniciar Sesion</a>
                        @else
                            <form method="POST" action="/cerrar" >
                            @csrf
                                <a href="#" onclick="this.closest('form').submit()">Cerrar Sesion</a>
                            </form>
                        
                        @endguest
                    </div>
                </div>
                
            </div>
        </div>
    </header>
    <div class="contenedor caja">
        <nav class="navegacion">
            <div class="menu_arriba">
                <div class="contenedor itemMenuSeleccionado"> <img src="{{ asset('images/iconos de index/casa.png') }}" class="icono">
                    &nbsp; &nbsp; Inicio </div>
                <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/usuario.png') }}" class="icono"> &nbsp; &nbsp;
                    Perfil </div>
                <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/notificacion.png') }}" class="icono"> &nbsp;
                    &nbsp; Notificaciones </div>
                <div class="contenedor itemMenu" onclick="publicar()"> <img src="{{ asset('images/iconos de index/megafono.png') }}" class="icono"> &nbsp; &nbsp;
                    Publicar </div>
                <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/conversacion.png') }}" class="icono"> &nbsp; &nbsp;
                    Mensajes </div>
                <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/guardados.png') }}" class="icono"> &nbsp; &nbsp;
                    Guardados </div>
                <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/configuraciones.png') }}" class="icono"> &nbsp;
                    &nbsp; Configuraciones </div>
            </div>
        </nav>
        <main class="principal">
            
            <div class="menuSuperior">
                <img src="{{ asset('images/Iconos/desplegar-menu.png') }}" alt="Menu">
            </div>

            <div class="perfil">
                <form>

                    <h2 class="texto"> Editar Perfil <h2>

                    <div class="imgPerfil">
                        <img src="{{ asset('images/imgPerfil/fotoPerfil.png') }}" alt="Perfil">
                    </div>

                    <div class="camposContenedor">
                        <input type="text" placeholder="Nombre de Usuario" class="campos">
                    </div>

                    <div class="camposContenedor">
                        <input type="text" placeholder="Nombre de la Cuenta" class="campos">
                    </div>

                    <div class="camposContenedor">
                       <textarea type="text" placeholder="Descripción" rows="5" class="campos"></textarea>
                    </div>

                    <div class="botonesContenedor">
                        <div class="botonesAlineacion">
                            <input type="button" value="Descartar" class="boton1">
                            <input type="button" value="Guardar" class="boton2">
                        </div>
                    </div>

                </form>

            </div>

        </main>
        <aside class="secundario contenedor">
            <div class="tendencia contenedor">
                <h4>Tendencias</h4>
                <a href="#" class="tendencia__enlace">naturaleza</a>
                <a href="#" class="tendencia__enlace">naturaleza</a>
                <a href="#" class="tendencia__enlace">naturaleza</a>
                <a href="#" class="tendencia__enlace">naturaleza</a>
                <span class="ver-mas">Ver más</span>
            </div>
            <div class="usuarios__interes">
                <h4>Usuarios de interes</h4>
                <div class="perfil__interes contenedor">
                    <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen__interes" title="interes">
                    <a href="#" class="tendencia__enlace">Interes</a>
                </div>
                <div class="perfil__interes contenedor">
                    <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen__interes" title="interes">
                    <a href="#" class="tendencia__enlace">Interes</a>
                </div>
                <div class="perfil__interes contenedor">
                    <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen__interes" title="interes">
                    <a href="#" class="tendencia__enlace">Interes</a>
                </div>
                <div class="perfil__interes contenedor">
                    <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen__interes" title="interes">
                    <a href="#" class="tendencia__enlace">Interes</a>
                </div>
                <span class="ver-mas">Ver más</span>
            </div>
            <footer class="pie">
                <p class="texto-pie">Copyright 2023 Waining red social N.Rodriguez, M.Villarroel, G.Rodriguez</p>
            </footer>
        </aside>
    </div>
    <script src="{{ asset('js/changeImages.js') }}"></script>
</body>

</html>