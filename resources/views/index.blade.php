
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Waning</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publication.css') }}" rel="stylesheet">
    <link href="{{ asset('images/iconos/logopequeño.ico') }}" rel="icon" type="image/ico">
</head>

<body>
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
                <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/megafono.png') }}" class="icono"> &nbsp; &nbsp;
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
            <div class="historia contenedor">
                <div class="perfil contenedor">
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/mario.png') }}" alt="" class="perfil__imagen" title="tu historia">
                        <label class="texto__historia">Tu historia</label>
                    </div>
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
                    </div>
                    <div class="perfil__usuario contenedor">
                        <img src="{{ asset('images/inicio/foto perfil obama.jfif') }}" alt="" class="perfil__imagen" title="obama">
                        <label class="texto__historia">Obama</label>
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
                            </div>
                            <div class="publicacion__tarjeta contenedor">
                                <img alt="" class="tarjeta__imagen"
                                    id="tarjeta__siguiente">
                            </div>
            </div>
            <div class="accion contenedor">
                <div class="accion__opcion contenedor">
                    <img src="{{ asset('images/iconos de index/me-gusta.png') }}" alt="" title="me gusta" class="accion__imagen">
                    <img src="{{ asset('images/iconos de index/guardados.png') }}" alt="" title="guardar" class="accion__imagen">
                    <img src="{{ asset('images/iconos de index/compartir.png') }}" alt="" title="compartir" class="accion__imagen">
                </div>
            </div>
            <article class="publicacion__descripcion">
                <div class="publicacion__encabezado contenedor">
                    <div class="publicacion__encabezado__izquierda contenedor">
                        <img src="{{ asset('images/inicio/modern-architecture-building-in-the-evening.png') }}" alt=""
                            class="perfil__imagen publicacion__perfil">
                        <div class="encabezado__cuenta">
                            <label class="nombre__cuenta">Tu arquitectura moderna</label>
                            <label class="etiqueta__opaco">@Arquitectura123</label>
                        </div>


                    </div>
                    <div class="publicacion__encabezado__derecha">
                        <label for="" class="etiqueta__opaco"> Hace 1 hora</label>
                    </div>


                </div>
                <div class="contenido__texto">
                    <p class="texto__publicacion">
                        El cuarto menguante se interpreta como el fin de un ciclo y el comienzo de otro,
                        un momento propicio para dejar ir lo antiguo y prepararse para las nuevas oportunidades
                        y experiencias que están por venir.
                    </p>
                    <label class="etiqueta__opaco">Ver los 35 comentarios</label>
                </div>
            </article>
            <div class="navegacion-movil contenedor">
                <div class="nav-movil contenedor">
                    <div class="itemMenuSeleccionado-movil"> <img src="{{ asset('images/iconos de index/casa-blanco.png') }}" class="icono">
                   </div>
                    <div> <img src="{{ asset('images/iconos de index/buscar.png') }}" class="icono">
                   </div>
                    <div> <img src="{{ asset('images/iconos de index/notificacion-blanco.png') }}" class="icono"></div>
                    <div> <img src="{{ asset('images/iconos de index/usuario-blanco.png') }}" class="icono">
                    </div>
                </div> 
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