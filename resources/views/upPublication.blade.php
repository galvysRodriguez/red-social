
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

<body>
    
     
        @include('commom/header')
    <div class="contenedor caja">
        <nav class="navegacion">
            <div class="menu_arriba">
            <a href="/">
                    <div class="contenedor itemMenu"> 
                        <img src="{{ asset('images/iconos de index/casa.png') }}" class="icono">
                        &nbsp; &nbsp; Inicio  
                    </div>
                </a>
                <a href="/profile">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/usuario.png') }}" class="icono"> &nbsp; &nbsp;
                     Perfil 
                    </div>
                </a>
                <a href="/">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/notificacion.png') }}" class="icono"> &nbsp;
                    &nbsp; Notificaciones 
                    </div>
                </a>
                <a href="/upPublication">
                    <div class="contenedor itemMenuSeleccionado"> <img src="{{ asset('images/iconos de index/iconos rellenos/publicar-relleno.png') }}" class="icono"> &nbsp; &nbsp;
                        Publicar 
                    </div>
                </a>
                <a href="/">
                    <div class="contenedor itemMenu"> <img src="{{ asset('images/iconos de index/conversacion.png') }}" class="icono"> &nbsp; &nbsp;
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
        <main class="principal">
            
        <form class="fondo" id="publicarFondo" action="/upPublication" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="ventana">

        <div class="publicarContenedor1">
            <a href="/"><img src="{{ asset('images/Iconos/equis.png') }}" width="24"></a>
    
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
        <input id="botonPublicar" class="botonPublicar"  type="submit" value="Publicar">
    </div>
</div>

</div>
        </form>
        @include('commom/mobile')
        </main>
        
        @include('commom/right-bar')
    </div>
    <script src="{{ asset('js/publicar.js') }}"></script>
    <script src="{{ asset('js/profileOption.js') }}"></script>
</body>

</html>