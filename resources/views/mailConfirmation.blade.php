<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/alert.js') }}"></script>

    <title>Waning mensaje de confirmacion</title>
</head>
<body>
    <div style="display:flex; justify-content: center; align-items: center; width:100vw; height:100vh;">
        <div style="margin:auto; width:300px; height:300px">
            <h1><b>Operacion con exito</b></h1>
            <p>
                Este mensaje fue enviado
            </p>
            <a style="text-decoration:none; color:#1877F2" href="{{ asset('/') }}">Volver al inicio</a>
    </div>
    <script>
        Swal.fire(
            'Operacion con exito',
            'Este mensaje fue enviado!',
            'success'
            )
    </script>
</body>
</html>