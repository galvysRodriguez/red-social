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
            @if (Auth::check())
            <div class="perfil__usuario contenedor" id="usuario__perfil">
                <div class="perfil__usuario__principal">
                
                    <h3>{{ Auth::user()->nombre_cuenta }}</h3>
               
                    
                </div>
                <img src="{{ asset('images/inicio/mario.png') }}" alt="" title="foto de perfil" class="perfil__imagen perfil__sesion">
                <div class="icono-barra">
                    <img src="{{ asset('images/inicio/barra desplegable.svg') }}" alt="" class="barra__perfil" id="mostrar">
                    <img src="{{ asset('images/inicio/subir-opciones.svg') }}" alt="" class="barra__perfil" id="ocultar">
                </div>
                @else
                    <a id="btn_iniciar" href="/login">
                        <div><p>Iniciar sesión</p></div></a>
                @endif
                <div class="encabezado__mensajes">
                    <img class="icono" src="{{ asset('images/iconos de index/conversacion-blanco.png') }}" alt="">
                </div>
            </div>
            
        </div>
        
    </header>