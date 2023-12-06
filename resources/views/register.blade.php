<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro de WANING</title>
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCss/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/FormatoLogin.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/DisLogin.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/CredeInvalida.css')}}">
    <script src="https://www.paypal.com/sdk/js?client-id=AR6QwbGn2AlqbUUnwisJg0hDe3zftqPFqhDzOOIyElsQJMjhY929jEVFCZXvRtI0UK_cuNwA3KvAKtAn"></script>
    <link href="{{ asset('images/iconos/logopequeño.ico') }}" rel="icon" type="image/ico">
</head>

<body>

    <div class="overflow-x-hidden vw-100 p-0 m-0">

        <div class="row vh-100 p-0 m-0">

            <div class="d-none d-md-block col-md-6 p-0 d-flex justify-content-center align-items-center bg-info">
                <div class="imgFormulario">
                    <img src="{{ asset('images/ImgLogin/Black And White Modern Vintage Retro Brand Logo (2).png') }}">
                </div>
            </div>

            <div class="col-sm-12 col-md-6 FormBack d-public/inicio_sesion/Registro.html public/inicio_sesion/Login.html justify-content-center align-items-center" style="display: flex; flex-direction: column;">
            <div  style = "display: flex; margin:auto; flex-direction: column;">
                <a style = "padding: 15px; margin:auto;" href="{{asset('/')}}">
                    <img src="{{ asset('images/iconos de index/logopequeño.png') }}" alt="" title="logo" class="logo" style="width:64px; height: 64px;">
                </a>
            </div>
                <form method="POST" action="/register" class="col-10 Fondo2 bg-body rounded-2 border border-1 border-black" style="margin:auto;">
                    @csrf
                    <div style="width: 100%; margin-top: 5%;">
                        <div class="formato WaningLogin" style="width: 100%; display: flex; justify-content: center;">
                            <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}">
                        </div>
                        <div class="formato WaningLogin" style="width: 100%; display: flex; justify-content: center;">
                            <p>Inicio de sesión</p>
                        </div>
                    </div>

                    <div class="formato ContLogin User">
                        <img src="{{ asset('images/ImgLogin/correo.png') }}" class="icon" style="width=48px; height=48px">
                        <input placeholder="Correo Electronico" type="email" id="Correo" name="correo" required>
                    </div>

                    <div class="formato ContLogin User">
                        <img src="{{ asset('images/ImgLogin/usuario.png') }}" class="icon">
                        <input placeholder="Nombre de Usuario" type="text" id="usuario" name="usuario" required>
                    </div>

                    <div class="formato ContLogin User">
                        <img src="{{ asset('images/ImgLogin/usuario.png') }}" class="icon">
                        <input placeholder="Nombre de Cuenta" type="text" id="cuenta" name="cuenta" required>
                    </div>

                    <div class="formato ContLogin User">
                        <img  class="icon" style="visibility: hidden">
                        <input type="date" id="fecha" name="fecha" required>
                    </div>

                    <div class="formato ContLogin Contra">
                        <img src="{{ asset('images/ImgLogin/contraseña.png') }}" class="icon">
                        <input placeholder="Contraseña" type="password" id="contraseña" name="contraseña1" required>
                      
                    </div>

                    <div class="formato ContLogin Contra">
                        <img src="{{ asset('images/ImgLogin/contraseña.png') }}" class="icon">
                        <input placeholder=" Repetir Contraseña" type="password" id="repcontraseña" name="contraseña2" required>
                       
                    </div>

                    @if($errors)
                            <div class="Crede-Invalidas">
                                <p>{{ $errors->first() }}</p>
                            </div>
                    @endif

                    <div class="formato password-olvido">
                        <a href="{{ asset('/forgot-password') }}">¿Olvidaste tu contraseña?</a>
                    </div>

                    <div class="formato ContLogin">
                        <input type="submit" value="Ingresar" id="boton-ingresar">
                    </div>
                    
                    <div class="formato registarse">
                        <p>Si ya tienes cuenta, <a style="margin-left: 2px;" href="{{ asset('/login') }}">Inicia sesion</a></p>
                    </div>

                </form>
                <footer class="pie">
                    <p class="texto-pie">Copyright 2023 Waining red social N.Rodriguez, M.Villarroel, G.Rodriguez</p>
                </footer>

            </div>

        </div>

    </div>

</body>

</html>