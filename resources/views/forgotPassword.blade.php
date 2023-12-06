<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restablecer Contraseña Waining</title>
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCss/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/FormatoLogin.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/ResContra.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/DisLogin.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/CredeInvalida.css')}}">
    <link href="{{ asset('images/iconos/logopequeño.ico') }}" rel="icon" type="image/ico">
</head>

<body>

    <div class="overflow-x-hidden vw-100 p-0 m-0">

        <div class="row vh-100 p-0 m-0">

            <div class="d-none d-md-block col-md-6 p-0 d-flex justify-content-center align-items-center">
                <div class="imgFormulario">
                    <img src="{{ asset('images/ImgLogin/Black And White Modern Vintage Retro Brand Logo (2).png') }}">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 FormBack d-flex justify-content-center align-items-center" style="display: flex; flex-direction: column;">
            <div  style = "display: flex; margin:auto; flex-direction: column; justify-content:center;">
                <a style = "margin:auto;" href="{{asset('/')}}">
                    <img src="{{ asset('images/iconos de index/logopequeño.png') }}" alt="" title="logo" class="logo" style="width:64px; height:64px;">
                </a>

            </div>
                <form method="POST" action="/forgot-password" class=" Fondo2 bg-body rounded-13 border border-3 border-original" style="margin:auto;">
                    @csrf
                    <div style="width: 100%; margin-top: 5%;">
                        <div class="formato WaningLogin" style="width: 100%; display: flex; justify-content: center;">
                            <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}">
                        </div>
                        <div class="formato WaningLogin" style="width: 100%; display: flex; justify-content: center;">
                            <p>Restablecer Contraseña</p>
                        </div>
                    </div>

                    <div class="formato ContLogin User">
                        <img src="{{ asset('images/ImgLogin/usuario.png') }}" class="icon">
                        <input placeholder="Usuario o Correo Electronico" type="text" id="Correo" name="usuario">
                    </div>

                    <div class="nota">
                        <p><b>Nota: </b> Se te enviará la información a tu correo</p>
                    </div>

                    @if($errors)
                            <div class="Crede-Invalidas">
                                <p>{{ $errors->first() }}</p>
                            </div>
                    @endif

                    <div class="formato iniciar-sesion">
                        <a href="{{ asset('/login') }}">Iniciar Sesión</a>
                    </div>

                    <div class="formato ContLogin">
                        <input type="submit" value="Enviar" id="boton-ingresar">
                    </div>
                    
                    <div class="formato registarse">
                        <p>Si todavía no tienes cuenta, <a style="margin-left: 2px;" href="{{ asset('/register') }}"> Registrate</a></p>
                    </div>

                </form>
                <footer class="pie">
                    <p class="texto-pie">Copyright 2023 Waining red social N.Rodriguez, M.Villarroel, G.Rodriguez</p>
                </footer>
                

            </div>

        </div>

    </div>

</body>