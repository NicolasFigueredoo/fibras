<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de contacto</title>
</head>
<body>
    <p>¡Hola!</p>
    <p>Has recibido un nuevo mensaje de contacto de {{ $nombre }}</p>
    <p> <strong>Email: </strong>{{ $email }} <strong>Celular: </strong>{{ $celular }} <strong>Empresa: </strong>{{ $empresa }}</p> 
    <p> <strong>Mensaje: </strong> {{ $mensaje }}</p>
</body>


<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
body{
  font-size: 16px;
  color: black;
  font-family: "Montserrat", sans-serif;
  font-weight: 400;
}
</style>
</html>
