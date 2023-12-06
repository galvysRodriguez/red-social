
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
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/CredeInvalida.css')}}">
    <script src="https://www.paypal.com/sdk/js?client-id=AR6QwbGn2AlqbUUnwisJg0hDe3zftqPFqhDzOOIyElsQJMjhY929jEVFCZXvRtI0UK_cuNwA3KvAKtAn"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <link href="{{ asset('images/iconos/logopequeño.ico') }}" rel="icon" type="image/ico">

    <script src="{{ asset('js/publicar.js') }}"></script>
</head>

<body>
    
     
        @include('commom/header')
    <div class="contenedor caja">
        <nav class="navegacion">
            <div class="menu_arriba">
            <a href="{{ asset('/') }}">
                    <div class="contenedor itemMenu"> 
                        <img src="{{ asset('images/iconos de index/casa.png') }}" class="icono">
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
                    <div class="contenedor itemMenuSeleccionado"> <img src="{{ asset('images/iconos de index/iconos rellenos/publicar-relleno.png') }}" class="icono"> &nbsp; &nbsp;
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
        <main class="principal">
            
        <form class="fondo" id="publicarFondo" action="/upPublication" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="ventana">

        <div class="publicarContenedor1">
            <a href="{{ asset('/') }}"><img src="{{ asset('images/Iconos/equis.png') }}" width="24"></a>
    
</div>
<div style="display:flex; align-items:center; justify-content:center;">
<h1 >Cargar publicacion</h1>
</div>

<div style="display:flex; align-items:center; justify-content:center; margin-top:10px;">
        <input type="file" name="archivo" id="archivo" accept="image/*" onchange="mostrarImagen()">
        <label id="subir" for="archivo">Seleccionar Archivo</label>
</div>
        

<div  class="publicarContenedor2" style="height: 40%; margin-top: 3%;">
    <div id="contenedorImagen" class="insertarImg" style="heigth:100%;display:flex; flex-direction:column;">
        <h4>Inserte la imagen</h4>
    </div>
</div>

<div class="publicarContenedor2" style="height: 20%; margin-top: 1%;">
    <textarea name="descripcion" class="insertarImg" placeholder="Descripcion"></textarea>
</div>
@if($errors)
                            <div class="Crede-Invalidas">
                                <p>{{ $errors->first() }}</p>
                            </div>
                    @endif


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
    <script src="{{ asset('js/convertPremium.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
</body>

</html>