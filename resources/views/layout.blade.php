<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
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

    
    @vite('resources/js/website.js')
</body>
</html>
