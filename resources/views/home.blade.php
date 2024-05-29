@extends('layout')

@section('content')
    <div>
        <div class="imagenPrincipal">
            @if ($contentType === 'imagen')
                <div class="background-image"
                    style="background-image: url('{{ url('/getImage/' . basename($slider[0]['imagen'])) }}');">
                </div>
            @elseif ($contentType === 'video')
                <video class="background-video" autoplay loop muted>
                    <source src="{{ url('/getImage/' . basename($slider[0]['imagen'])) }}" type="video/mp4">
                    Tu navegador no soporta la reproducción de videos.
                </video>
            @endif
            <div class="overlay"></div>



            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand" href="/">
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
                            <div class="navbar-nav">
                                <a class="nav-link text-white" href="/nosotros">Nosotros</a>
                                <a class="nav-link text-white" href="/servicios">Servicios</a>
                                <a class="nav-link text-white" href="/productos">Productos</a>
                                <a class="nav-link text-white" href="/sectores">Sectores</a>
                                <a class="nav-link text-white" href="/clientes">Clientes</a>
                                <a class="nav-link text-white" href="/calidad">Calidad</a>
                                <a class="nav-link text-white" href="/contacto">Contacto</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="container textoEncima">
                {!! $slider[0]['texto'] !!}
            </div>

        </div>

        <!---CATEGORIAS--->
        <div class="container">

            <div>
                <p class="textoProductos">Productos</p>
                <div class="row flex-wrap categorias">
                    @foreach ($categorias as $categoria)
                        <div class="col-lg-4">
                            <a href="/categoria/{{ $categoria->id }}/null" style="text-decoration: none">
                                <div class="d-flex justify-content-around align-items-center categoria">
                                    <div class="contenedor-img">
                                        <div class="categoria-img"></div>
                                    </div>
                                    <div class="contenedor-textCategoria">
                                        <p class="textCategoria">{{ $categoria->nombre }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!---SECCION 1 HOME--->
        <div class="w-100">
            <div class="row contenedorSeccion" style="margin-right: 0px">
                <div class="col-lg-7 contenedorSeccionImagen">
                    <div
                        style="background-image: url('{{ url('/getImage/' . basename($seccion[0]['imagen'])) }}'); 
                background-size: cover; 
                background-position: center;
                background-repeat: no-repeat;
                width: 100%;
                height: 100%;">
                    </div>
                </div>
                <div class="col-lg-5 contenedor-textoSeccion">
                    <p class="tituloSeccion">{!! $seccion[0]['titulo'] !!}</p>

                    <div class="descripcionSeccion">{!! $seccion[0]['texto'] !!}</div>

                    <a href="/nosotros">
                        <button type="button" id="btnSeccion" class="btn">Ver más</button>
                    </a>

                </div>

            </div>

        </div>

        <!---SECCION SECTORES--->
        <div class="container" style="margin-top: 100px">
            <div class="d-flex justify-content-between align-items-center">
                <div class="tituloSectores">
                    <p>Sectores</p>
                </div>
                <div>
                    <a href="/sectores">
                        <button type="button" id="btnSectores" class="btn">Ver todos</button>
                    </a>

                </div>
            </div>

            <div class="row flex-wrap sectores">
                @foreach ($sectores as $sector)
                    <div class="col-md-3">
                        <div class="sector">
                            <div class="sector-imagen">
                                <div class="imagen-hover"
                                    style="background-image: url('{{ url('/getImage/' . basename($sector->imagen)) }}');
               background-size: cover; 
               background-position: center;
                background-repeat: no-repeat;
                width: 100%;
                height: 100%;
            
            ">
                                </div>
                                <div class="overlayTwo"></div>
                                <div class="contenedor-textSector">
                                    <p class="textSectores">{{ $sector->titulo }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>

    </div>
@endsection

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    .navbar {
        height: 130px;
        background: transparent;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
    }

    .navbar-collapse {
        height: 100px;
    }

    .imagenPrincipal {
        position: relative;
        height: 768px;
        width: 100%;
    }

    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index: 1;
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
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.60) 0%, rgba(0, 0, 0, 0.00) 80.27%);
        z-index: 2;
    }

    .imagenNavbar {
        width: 79px;
        height: 103px;
    }

    .nav-link {
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .container {
        position: relative;
        z-index: 1100;
    }

    .textoEncima {
        margin-top: 150px;
        display: flex;
        flex-direction: column;
        align-items: left;
        position: relative;
        z-index: 3;
        color: #FFF;
        font-family: Inter;
        font-style: normal;
        font-weight: 700;
        line-height: 130%;
    }

    .textoProductos {
        color: #000;
        font-family: Inter;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-top: 80px;
        margin-bottom: 58px;

    }

    .categorias {
        margin-bottom: 80px;

    }

    .categoria {
        height: 196px;
        flex-shrink: 0;
        border-radius: 8px;
        background: #F5F5F5;
        mix-blend-mode: color;
        cursor: pointer;
    }


    .contenedor-img {
        width: 121px;
        height: 122px;
        flex-shrink: 0;
    }

    .categoria-img {
        background-image: url('/img/logoCategoria.png');
        filter: grayscale(1);
        width: 100%;
        height: 100%;
    }

    .categoria:hover .categoria-img{
        filter: grayscale(0);

    }

    .textCategoria {
        color: #000;
        font-family: Inter;
        font-size: 22px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .contenedor-textCategoria {
        width: 171px;
    }


    .contenedorSeccion {
        height: 650px;
        background: var(--Celeste, #29A2C4);
        display: flex;
        justify-content: space-between;


    }

    .contenedorSeccionImagen {
        height: 100%;
    }

    .contenedor-textoSeccion {
        padding-top: 110px;
        padding-left: 80px !important;
    }

    .tituloSeccion {
        color: #FFF;
        font-family: Inter;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
        line-height: 130%;
    }

    .descripcionSeccion {
        padding-top: 30px;
        color: #FFF;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 160% !important;
        line-height: 0.8 !important;

    }

    #btnSeccion {
        display: inline-flex;
        margin-top: 30px;
        background: transparent;
        border: 1px solid white;
        border-radius: 40px;
        padding: 10px 32px;
        color: white;
        height: 40px;
        justify-content: center;
        align-items: center;

        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .tituloSectores {
        color: #000;
        font-family: Inter;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }


    #btnSectores {
        display: inline-flex;
        height: 40px;
        background: transparent;
        border-radius: 40px;
        border: 1px solid var(--Naranja, #F2AE59);
        padding: 10px 32px;
        justify-content: center;
        align-items: center;
        color: #131313;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    #btnSectores:hover {
        color: white;
        background: #F2AE59;


    }

    .sectores {
        margin-bottom: 100px;
    }

    .sector {
        height: 376px;
        flex-shrink: 0;
        margin-top: 63px;
    }

    .textSectores {
        color: #FFF;
        text-align: center;
        font-family: Inter;
        font-size: 24px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .sector-imagen {
        position: relative;
        width: 100%;
        height: 376px;
        background-size: cover;
        background-position: center;
        border-radius: 8px;
        overflow: hidden;
    }

    .imagen-hover {
        position: absolute;
        width: 100%;
        height: 100%;
        transition: transform 0.3s ease;
    }

    .sector-imagen:hover .imagen-hover {
        transform: scale(1.1);
    }

    .sector-imagen:hover .overlayTwo {
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 30.25%, rgba(0, 0, 0, 0.90) 100%);
    }


    .overlayTwo {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 56.25%, rgba(0, 0, 0, 0.70) 100%);
        border-radius: 8px;
    }

    .contenedor-textSector {
        width: 100%;
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
        text-align: center;
        color: #FFF;
        text-align: center;
        font-family: Inter;
        font-size: 24px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }


    @media screen and (max-width: 1000px) {
        .categoria {
            margin-top: 20px
        }

        .contenedorSeccion {
            flex-direction: column;
            height: auto;
        }

        .contenedorSeccionImagen {
            width: 100%;
            height: 650px;
            padding-right: 0px !important;
        }

        .contenedor-textoSeccion {
            width: 100%;
            padding-left: 0;
        }



    }
</style>
