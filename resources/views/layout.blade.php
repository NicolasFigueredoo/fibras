<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibras Argentinas</title>
    @vite('resources/css/website.css')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

    <style>
         @font-face {
            font-family: 'FuturaBook';
            src: url('{{ asset('fonts/FuturaBook.ttf') }}') format('truetype');
            font-style: normal;
            font-weight: 600;

        }

        @font-face {
            font-family: 'FuturaBook2';
            src: url('{{ asset('fonts/FuturaBook2.ttf') }}') format('truetype');
            font-style: normal;
            font-weight: bold;

        }
        
        @font-face {
            font-family: 'FuturaBookMd';
            src: url('{{ asset('fonts/FuturaBook3.ttf') }}') format('truetype');
            font-style: normal;
            font-weight: bold !important;

        }

        

      
    </style>
</head>
<body>

    <div id="app">
        
        @if (!Route::is('home') && !Route::is('nosotros'))
        <x-navbar></x-navbar>
        @endif

         @yield('content')
        <x-footer></x-footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

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
