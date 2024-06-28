<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de presupuesto</title>
</head>
<body>
    <p>¡Hola!</p>
    <p>Cotizacion de presupuesto para {{ $nombre }}</p>
    @if($empresa !== 'null')
    <p> <strong>Empresa: </strong> {{ $empresa }}</p>
    @endisset



    <p> <strong>Email: </strong>{{ $email }} <strong>Celular: </strong>{{ $telefono }}</p>
    @if ($producto !== 'null')
    <p><strong>Sobre producto:</strong></p>
    <p>{{ $producto }}</p>
    @endif
    @if ($mensaje !== 'null')

    <p> <strong>Mensaje: </strong> {{ $mensaje }}</p>

    @endif

</body>


<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
body{
  font-size: 15px;
  color: black;
  font-family: "Montserrat", sans-serif;
  font-weight: 400;
}
</style>
</html>
