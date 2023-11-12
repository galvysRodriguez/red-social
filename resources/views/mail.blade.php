<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>¡Has solicitado restablecer tu contraseña!</p>
    <p><b>Solo valido durante 30 minutos</b></p>
    <p>Haz clic en el siguiente enlace para cambiar tu contraseña:</p>
    <a href="{{ route('password.reset', ['token' => $token]) }}">Cambiar Contraseña</a>
</body>
</html>