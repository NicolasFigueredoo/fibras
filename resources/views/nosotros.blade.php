@extends('layout')

@section('content')
    <div class="imagenPrincipal">


        <div id="carouselExampleIndicators" class="carousel slide w-100" style="height: 600px;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $index => $slider)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        @if ($slider->contentType == 'imagen')
                            <div style=" height: 768px;">
                                <div class="background-image"
                                    style="background-image: url('{{ url('/getImage/' . basename($slider['imagen'])) }}');
                                background-size: cover; 
                                background-position: center;
                                width: 100%;
                                height: 100%;                                    ">
                                </div>e

                                <div class="container carousel-caption textoEncima">
                                    @if ($idiomaActive == 'ES')
                                        <p class="indicador"><b>Inicio</b> > Nosotros</p>
                                        <div>{!! $slider->texto !!}</div>
                                    @else
                                        <p class="indicador"><b>Começar</b> > Nós</p>
                                        <div>{!! $slider->textoAlternativo !!}</div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="container carousel-caption textoEncima">

                                @if ($idiomaActive == 'ES')
                                    <p class="indicador"><b>Inicio</b> > Nosotros</p>
                                    <div>{!! $slider->texto !!}</div>
                                @else
                                <p class="indicador"><b>Começar</b> > Nós</p>
                                <div>{!! $slider->textoAlternativo !!}</div>
                                @endif
                            </div>
                            <video class="d-block w-100" style="height: 768px; object-fit: cover;" controls autoplay muted>
                                <source src="{{ url('/getImage/' . basename($slider['imagen'])) }}" type="video/mp4">
                                Tu navegador no soporta la reproducción de videos.
                            </video>
                        @endif


                    </div>
                @endforeach
            </div>
        </div>



        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <div class="imagenNavbar">
                            <div
                                style="background-image: url('{{ url('/getImage/' . basename($logo[0]['header'])) }}'); 
                    background-size: cover; 
                    background-position: center;
                    width: 100%;
                    height: 100%;">
                            </div>
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end align-items-end" id="navbarNavAltMarkup">
                        <div class="navbar-nav flex-column">
                            <div class="d-flex justify-content-end align-items-center gap-2">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M17.5001 17.5001L13.9167 13.9167" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-white">|</span>
                                </div>
                                <div class="w-20">
                                    <select class="form-select idioma-select" aria-label="Default select example">
                                        @foreach ($idiomas as $idioma)
                                            @if ($idioma->activo == 1)
                                                <option value="{{ $idioma->id }}" selected>{{ $idioma->idioma }}
                                                </option>
                                            @else
                                                <option value="{{ $idioma->id }}">{{ $idioma->idioma }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>


                            </div>
                            <div class="d-flex justify-content-end align-items-center">
                                @foreach ($opcionesNavegador as $option)
                                    <a class="nav-link text-white" href="{{ $option['url'] }}">{{ $option['name'] }}</a>
                                @endforeach
                                {{-- @auth
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a class="nav-link text-white" style="cursor: pointer" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 448 512">
                                        <path fill="#ffffff"
                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                    </svg>
                                </a>
                            @endauth --}}
                            </div>


                        </div>
                    </div>
                </div>
            </nav>
        </div>



    </div>
    <div class="container" style="padding-bottom: 100px">


        <div class="row d-flex" style="margin-top: 80px;">

            <div class="col-lg-6 contenedor-textoSeccion">
                @if ($idiomaActive == 'ES')
                    <p class="tituloSeccion">{!! $seccion[0]['titulo'] !!}</p>

                    <div>

                        <div class="descripcionSeccion">{!! $seccion[0]['texto'] !!}</div>
                    </div>
                @else
                    <p class="tituloSeccion">{!! $seccion[0]['tituloAlternativo'] !!}</p>

                    <div>

                        <div class="descripcionSeccion">{!! $seccion[0]['textoAlternativo'] !!}</div>
                    </div>
                @endif

            </div>
            <div class="col-lg-6 contenedorImagen">
                <div
                    style="background-image: url('{{ url('/getImage/' . basename($seccion[0]['imagen'])) }}'); 
                background-size: cover; 
                background-position: center;
                width: 100%;
                height: 100%;

                ">
                </div>
            </div>

        </div>

    </div>


    <div class="services">
        <div class="container" style="padding-top: 70px">
            @if ($idiomaActive == 'ES')
                <p class="textoService">Por que elegirnos</p>
            @else
                <p class="textoService">Porque escolher-nos</p>
            @endif

            <div class="row d-flex flex-wrap" style="padding-top: 30px;padding-bottom: 70px; ">
                @foreach ($servicios as $servicio)
                    <div class="justify-content-around col-lg-4">
                        <div class="p-5 tarjeta d-flex flex-column justify-content-center align-items-center"
                            style="padding-top: 50px">

                            <div class="contenedorServicioImagenes">

                                <div
                                    style="background-image: url('{{ url('/getImage/' . basename($servicio->imagen)) }}'); 
                                background-size: containt; 
                                background-repeat: no-repeat;
                                background-position: center;
                                width: 100%;
                                height: 100%;
                
                                ">
                                </div>

                            </div>

                            @if ($idiomaActive == 'ES')
                                <p class="textoIcon" style="padding-top: 10px;">{{ $servicio->titulo }}</p>
                                <p class="infoIcon">{!! $servicio->texto !!}</p>
                            @else
                                <p class="textoIcon" style="padding-top: 10px;">{{ $servicio->tituloAlternativo }}</p>
                                <p class="infoIcon">{!! $servicio->textoAlternativo !!}</p>
                            @endif

                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </div>


    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $('.svg-overlay').on('click', function() {
            $(this).toggleClass('active');
        });

        $('.idioma-select').on('change', function() {
            var selectedIdioma = $(this).val();

            $.ajax({
                url: '/changeIdioma',
                method: 'POST',
                data: {
                    idioma: selectedIdioma,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error al enviar el idioma seleccionado:', error);
                }
            });
        });
    });
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    .services {
        background-color: #F5F5F5;
    }


    .textoService {
        color: var(--azul, #00245D);
        font-family: "FuturaBook";
        font-size: 35px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase;
    }


    .contenedorServicioImagenes {
        width: 60px;
        height: 60px;
        flex-shrink: 0;
    }


    .tituloSeccion2 {
        color: #131313;
        font-family: Inter;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
        line-height: 130%;
        /* 41.6px */
    }

    .navbar {
        height: 130px;
        background: transparent;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
    }

    .carousel {
        position: absolute !important;
        height: 768px;
    }

    .navbar-collapse {
        height: 100px;
    }


    .imagenPrincipal {
        position: relative;
        height: 768px;
        width: 100%;
    }

    .indicador b {
        color: #FFF;
        font-family: "FuturaBook";
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 60px;
    }

    .indicador {
        gap: 5px;
        display: flex;
        align-items: left;
        position: relative;
        z-index: 3;
        color: #FFF;
        font-family: "FuturaBook";
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 60px;
        margin-bottom: 150px;


    }


    .background-image {

        width: 100%;
        height: 100%;

    }

    .background-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.43) 0%, rgba(0, 0, 0, 0.00) 100%), rgba(0, 36, 93, 0.60);
        z-index: 5;
    }

    .imagenNavbar {
        width: 280px;
        height: 70px;
        flex-shrink: 0;
    }

    .nav-link {
        font-family: 'FuturaBook';
        color: #FFF;
        text-align: center;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }


    .container {
        position: relative;
        z-index: 1100;
    }

    .textoEncima {
        margin-top: 250px;
        display: flex;
        flex-direction: column;
        align-items: left;
        position: relative;
        z-index: 3;
        color: #FFF;
        font-family: 'FuturaBook';
        font-style: normal;
        font-weight: 700;
        line-height: 130%;
    }

    .form-select {
        width: 70px !important;
        background-color: transparent !important;
        border: none !important;
        outline: none !important;
        cursor: pointer;
        color: white !important;
        padding-left: 0px;
        font-size: 18px;
    }

    .form-select option {
        color: #000;
        background-color: #fff;
    }

    .form-select::after {
        content: '\25BC';
        position: absolute;
        right: 1em;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: white !;
        font-size: 1em;
    }



    .carousel-caption {

        display: flex;
        justify-content: start;
        flex-direction: column;
        align-items: start;
        text-align: justify !important;
        margin-bottom: 250px;

    }

    .carousel-indicators {
        position: absolute;
        bottom: 10px;
        left: 55%;
        transform: translateX(-50%);
    }

    .carousel-indicators button {
        width: 91px;
        height: 6px !important;
        flex-shrink: 0;
        background-color: #fff;
        border: 2px solid #333;
        margin: 0 5px;
    }

    .carousel-indicators .active {
        background-color: #333;
    }

    .svg-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        background-image: url('{{ asset('svgs/svgCeleste.svg') }}');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .contenedorImagen {
        width: 597px;
        height: 568px;
        flex-shrink: 0;

    }

    .tituloSeccion {

        font-family: "FuturaBook";
        color: var(--azul, #00245D);
        font-size: 35px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase;
    }

    .descripcionSeccion {
        padding-top: 10px;


        color: #000;
        font-family: "FuturaBook";
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: 28px !important;
    }

    .contenedor-textoSeccion {
        padding: 50px;

    }


    .contenedorServicioImagenes {
        width: 66px;
        height: 66px;
        flex-shrink: 0;
    }

    .textoIcon {
        color: var(--azul, #00245D);
        text-align: center;
        font-family: "FuturaBook";
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase;
    }

    .infoIcon {
        color: #0F0F0F;
        text-align: center;
        font-family: "FuturaBook";
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 150%;
        /* 24px */
        padding-top: 10px;
    }

    .tarjeta {
        height: 362px;
        flex-shrink: 0;
        border-radius: 4px;
        background: #FFF;
        text-align: center !important;

    }

    @media screen and (max-width: 1000px) {
        .tarjeta {
            margin-top: 20px
        }
    }
</style>
