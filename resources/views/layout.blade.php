<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Quimica</title>
    @vite('resources/css/website.css')

</head>
<body>
    <div id="app">
        @if (!request()->is('/'))
        <x-navbar></x-navbar>
        @endif
         @yield('content')
        <x-footer></x-footer>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @vite('resources/js/website.js')
</body>
</html>

<style>
      .whatsapp-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: transparent;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            text-align: center;
            font-size: 24px;
            line-height: 60px;
            cursor: pointer;
            z-index: 1000;
        }

        /* Estilos para el icono SVG */
        .whatsapp-icon {
            width: 30px; /* Ajusta el tamaño del icono según sea necesario */
            height: 30px;
            fill: white; /* Color del icono */
            margin-top: 15px; /* Ajusta este valor según sea necesario para centrar verticalmente el icono */
        }
</style>
