<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Actualizar Contraseña Waining</title>
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCss/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/FormatoLogin.css')}}">
    <link rel="stylesheet" href="{{ asset('css/LoginCSS/ActuaContra.css')}}">
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
            <div class="col-sm-12 col-md-6 FormBack d-flex justify-content-center align-items-center" style="display: flex; flex-direction: column;" >

                <form method="POST" action="/update-password" class="Fondo2 bg-body rounded-13 border border-3 border-original" style="margin:auto;">
                    @csrf
                    <div style="width: 100%; margin-top: 5%;">
                        <div class="formato WaningLogin" style="width: 100%; display: flex; justify-content: center;">
                            <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}">
                        </div>
                        <div class="formato WaningLogin" style="width: 100%; display: flex; justify-content: center;">
                            <p>Actualice su contraseña</p>
                        </div>
                    </div>

                    <div class="formato ContLogin Contra">
                        <img src="{{ asset('images/ImgLogin/contraseña.png') }}" class="icon">
                        <input placeholder="Contraseña" type="password" id="Correo" name="contraseña1">
                    </div>

                                      
                    <div class="formato ContLogin ReContra">
                        <img src="{{ asset('images/ImgLogin/contraseña.png') }}" class="icon">
                        <input placeholder="Repita su contraseña" type="password" id="contraseña" name="contraseña2">
                    </div>

                    @if($errors)
                            <div class="Crede-Invalidas">
                                <p>{{ $errors->first() }}</p>
                            </div>
                    @endif

                    <div class="formato iniciar-sesion">
                        <a href="/login">Iniciar sesión</a>
                    </div>

                    <div class="formato ContLogin">
                        <input type="submit" value="Ingresar" id="boton-ingresar">
                    </div>
                    
                    <div class="formato registarse">
                        <p>Si todavía no tienes cuenta, <a href="/register"> Registrate</a></p>
                    </div>

                </form>
                <footer class="pie">
                    <p class="texto-pie">Copyright 2023 Waining red social N.Rodriguez, M.Villarroel, G.Rodriguez</p>
                </footer>

            </div>

        </div>

    </div>

</body>