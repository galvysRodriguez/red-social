<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Inicio de sesion de WANING</title>
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCss/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/FormatoLogin.css')}}">
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
                <img src="{{ asset('images/iconos de index/logopequeño.png') }}" alt="" title="logo" class="logo" style="width:64px; height:64px; margin:auto;">
                <h1><a style="color:#4C596C;" href="/">Waning</a></h1>
            </div>
                <form method="POST" action="/login" class=" Fondo2 bg-body rounded-13 border border-2 border-original" style="margin:auto;">
                    @csrf
                    <div style="width: 100%; margin-top: 5%;">
                        <div class="formato WaningLogin" style="width: 100%; display: flex; justify-content: center;">
                            <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" >
                        </div>
                        <div class="formato WaningLogin" style="width: 100%; display: flex; justify-content: center;">
                            <p>Inicio de sesión</p>
                        </div>
                    </div>

                    <div class="formato ContLogin User">
                        <img src="{{ asset('images/ImgLogin/usuario.png') }}" class="icon">
                        <input placeholder="Usuario o Correo Electronico" type="text" id="Correo" name="usuario" required>
                    </div>

                                      
                    <div class="formato ContLogin Contra">
                        <img src="{{ asset('images/ImgLogin/contraseña.png') }}" class="icon">
                        <input placeholder="Contraseña" type="password" id="contraseña" name="contraseña" required>
                        <img src="{{ asset('images/ImgLogin/VerContraseña.png') }}" class="IconVerContra">
                    </div>

                    @if($errors)
                            <div class="Crede-Invalidas">
                                <p>{{ $errors->first() }}</p>
                            </div>
                    @endif

                    <div class="formato password-olvido">
                        <a href="/forgot-password">¿Olvidaste tu contraseña?</a>
                    </div>

                    <div class="formato ContLogin">
                        <input type="submit" value="Ingresar" id="boton-ingresar">
                    </div>
                    
                    <div class="formato registarse">
                        <p>Si todavía no tienes cuenta, <a style="margin-left: 2px;" href="/register"> Registrate</a></p>
                    </div>

                </form>
                <footer class="pie">
                    <p class="texto-pie">Copyright 2023 Waining red social N.Rodriguez, M.Villarroel, G.Rodriguez</p>
                </footer>

            </div>

        </div>

    </div>

</body>