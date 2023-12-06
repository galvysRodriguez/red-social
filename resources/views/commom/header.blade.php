<header class="encabezado contenedor">
        <div class="encabezado__izquierdo contenedor">
            <a href="{{ asset('/') }}">
                <img src="{{ asset('images/iconos de index/logopequeño.png') }}" alt="" title="logo" class="logo">
                </a>
                <a href="{{ asset('/') }}">
                <h1 style =" color: #C6D1D8">Waning</h1>
                </a>
            
        </div>
        <div class="encabezado__central">
            <div class="central__busqueda contenedor">
                <input type="text" class="buscador" placeholder="Búsqueda">
                <span class="lupa__imagen"><img src="{{ asset('images/inicio/lupa busqueda.svg') }}" alt=""></span>
            </div>
            <div class="central__etiqueta contenedor">
                <div class="etiqueta seleccion contenedor">
                    <label class="etiqueta__contenido">Para ti</label>
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
                @if (optional(Auth::user())->foto_perfil)
                    <img src="{{ Auth::user()->foto_perfil }}" alt="" class="perfil__imagen perfil__sesion" title="foto de perfil">
                @else
                    <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" class="perfil__imagen perfil__sesion">
                @endif
                <div class="icono-barra">
                    <img src="{{ asset('images/inicio/barra desplegable.svg') }}" alt="" class="barra__perfil" id="mostrar">
                    <img src="{{ asset('images/inicio/subir-opciones.svg') }}" alt="" class="barra__perfil" id="ocultar">
                </div>
                @else
                    <a id="btn_iniciar" href="/login">
                        <div><p>Iniciar sesión</p></div></a>
                @endif

                <div class="encabezado__mensajes">
                    <a href="{{ asset('/message') }}">
                    <img class="icono" src="{{ asset('images/iconos de index/conversacion-blanco.png') }}" alt="">
                    </a>
                    
                </div>
            </div>
            
        </div>
        
    </header>
    