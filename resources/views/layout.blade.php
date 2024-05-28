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

    @php
    $wspNumber = new \App\Http\Controllers\WebsiteController();
    $numeroWhatsApp = $wspNumber->obtenerNumeroWhatsApp();
@endphp


    <a href="https://api.whatsapp.com/send?phone={{ $numeroWhatsApp }}" target="_blank" class="whatsapp-btn mb-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 75 75" fill="none">
            <path d="M37.5 75C58.2107 75 75 58.2107 75 37.5C75 16.7893 58.2107 0 37.5 0C16.7893 0 0 16.7893 0 37.5C0 58.2107 16.7893 75 37.5 75Z" fill="#22BE4A"/>
            <path d="M50.8896 24.0202C43.7496 16.8902 32.1896 16.9002 25.0596 24.0302C19.2296 29.8702 18.0296 38.9002 22.1496 46.0502L19.5596 55.5102L29.2396 52.9602C31.9196 54.4202 34.9196 55.1802 37.9696 55.1802C47.9896 55.3402 56.2396 47.3502 56.3996 37.3302C56.4796 32.3202 54.4796 27.5002 50.8896 24.0202ZM37.9796 52.1102C35.2596 52.1102 32.5896 51.3802 30.2496 50.0002L29.6996 49.6702L23.9596 51.1802L25.4896 45.5802L25.1296 45.0002C20.7696 37.8202 23.0596 28.4702 30.2296 24.1102C37.4096 19.7502 46.7596 22.0402 51.1196 29.2102C52.5296 31.5402 53.2996 34.2002 53.3296 36.9302C53.2396 45.3402 46.3996 52.1102 37.9796 52.1102ZM46.2996 40.7402C45.8496 40.5102 43.5996 39.4102 43.1796 39.2602C42.7596 39.1102 42.4596 39.0302 42.1496 39.4902C41.8396 39.9502 40.9696 40.9702 40.6996 41.2802C40.4296 41.5902 40.1696 41.6302 39.7096 41.4002C37.0296 40.0602 35.2696 39.0102 33.4996 35.9702C33.0296 35.1602 33.9696 35.2202 34.8396 33.4802C34.9596 33.2202 34.9496 32.9202 34.7996 32.6802C34.6896 32.4502 33.7696 30.2002 33.3896 29.2902C33.0196 28.4002 32.6396 28.5302 32.3596 28.5102C32.0996 28.4902 31.7896 28.4902 31.4896 28.4902C31.0196 28.5002 30.5796 28.7102 30.2696 29.0602C29.2296 30.0502 28.6496 31.4302 28.6696 32.8702C28.8196 34.5902 29.4696 36.2302 30.5296 37.5902C30.7596 37.8902 33.7496 42.5002 38.3296 44.4802C41.2296 45.7302 42.3596 45.8402 43.8096 45.6202C44.6896 45.4902 46.5096 44.5202 46.8896 43.4502C47.1896 42.7702 47.2796 42.0102 47.1496 41.2802C47.0396 41.0802 46.7396 40.9602 46.2896 40.7402H46.2996Z" fill="white"/>
          </svg>
    </a>
    
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
