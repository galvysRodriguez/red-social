
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Estadisticas Waning</title>
    <link href="{{ asset('css/PerfilCSS/perfil.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publication.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('images/iconos/logopequeño.ico') }}" rel="icon" type="image/ico">
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
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
                <a href= "{{ asset('/statistics') }}">
                    <div class="contenedor itemMenuSeleccionado"> <img src="{{ asset('images/iconos de index/iconos rellenos/estadistica-relleno.png') }}" class="icono"> &nbsp; &nbsp;
                        Estadisticas
                    </div>
                </a> 
            </div>
        </nav>
        @include('commom/profile-content')
        <main style="margin-left:15px; margin-right:15px;"id="perfil__contenido__principal" class="contenedor-perfil">
            <div style="display:flex; justify-content:center; margin: 30px auto;">
            <h1 >Estadisticas</h1>
            </div>
        
        <div width="500px" height="300px"><canvas style = "width:100%; height:100%"id="edadChart" ></canvas></div>
        <div width="400" height="100"><canvas style = "width:100%; height:100%" id="actividadDiariaChart" ></canvas></div>
        <div  width="400" height="100"><canvas style = "width:100%; height:100%" id="interaccionesChart"></canvas></div>
        

        </main>
        @include('commom/right-bar')
    </div>
    @include('commom/optionProfile')
    @include('commom/mobile')
    <script src="{{ asset('js/profileOption.js') }}"></script>
    <script src="{{ asset('js/menuMovil.js') }}"></script>

    <script src="{{ asset('js/usochart.js') }}"></script>
    <script src="{{ asset('js/pedirEstadistica.js') }}"></script>
</body>

</html>