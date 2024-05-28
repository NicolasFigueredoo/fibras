@extends('layout')

@section('content')
    <div class="container">
        @if ($producto)
            <p class="indicador"><b>Inicio / Servicios / {{ $categoria['nombre'] }} </b> / {{ $producto['nombre'] }} </p>
        @else
            <p class="indicador"><b>Inicio / Servicios</b> / {{ $categoria['nombre'] }}</p>
        @endif



        <div class="row d-flex">
            <div class="col-lg-3">
                <div class="w-100 divContenedor" style="border-bottom: 1px solid #E5E5E5">
                </div>
                <div class="w-100 divContenedor" style="border-bottom: 1px solid #E5E5E5">
                    <p class="categoriaSelect">{{ $categoria['nombre'] }}</p>
                </div>

                @foreach ($categorias as $cat)
                    @if ($categoria['nombre'] != $cat['nombre'])
                        <a href="/categoria/{{ $cat->id }}/null" style="text-decoration: none;">
                            <div class="w-100 divContenedor" style="border-bottom: 1px solid #E5E5E5">
                                <p class="categoriaName">{{ $cat['nombre'] }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach


            </div>

            <div class="col-lg-9">

                @if ($producto)
                    <div class="row">
                        <div class="col-lg-5">

                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach ($imagenes as $index => $imagen)
                                        <div class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                                            <div class="contenedor-imagen">
                                                <div
                                                    style="background-image: url('{{ url('/getImage/' . basename($imagen->path)) }}');
                                                           background-size: cover; 
                                                           background-position: center;
                                                           width: 100%;
                                                           height: 100%;
                                                           border-radius: 8px;                                                   
                                                    ">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                        </div>

                        <div class="col-lg-7">
                            <div class="d-flex flex-column">
                                <div>
                                    <p class="categoriaTextProducto">
                                        {{ strtoupper($categoria['nombre']) }}
                                    </p>
                                </div>
                                <div>
                                    <p class="productoTextInfo">
                                        {{ $producto['nombre'] }}

                                    </p>
                                </div>

                                <div class="productoDescripcion pt-2">
                                    {!! $producto['texto'] !!}

                                </div>

                                <div class="d-flex text-center" style="margin-top: 20px">
                                    @foreach ($litros as $litro)
                                        @if ($litro->cantidad <= 100)
                                            <div class="d-flex flex-column">
                                                <div class="contenedor-imagen-litro">
                                                    <div
                                                        style="background-image: url('{{ url('/getImage/' . basename($litro->imagen)) }}');
                                                       background-size: contain; 
                                                       background-repeat: no-repeat;
                                                       background-position: center;
                                                       width: 100%;
                                                       height: 100%;
                                                       border-radius: 8px;                                                   
                                                ">
                                                    </div>
                                                </div>

                                                <div>
                                                    <p class="litroName">{{ $litro->cantidad }} L</p>
                                                </div>

                                            </div>
                                        @else
                                            <div class="d-flex flex-column" style="padding-left: 50px">
                                                <div class="contenedor-imagen-litro">
                                                    <div
                                                        style="background-image: url('{{ url('/getImage/' . basename($litro->imagen)) }}');
                                                       background-size: contain; 
                                                       background-repeat: no-repeat;
                                                       background-position: center;
                                                       width: 100%;
                                                       height: 100%;
                                                       border-radius: 8px;                                                   
                                                ">
                                                    </div>
                                                </div>

                                                <div>
                                                    <p class="litroName">{{ $litro->cantidad }} L</p>
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach

                                </div>


                                <div>
                                    <button class="btn consultarBtn">Consultar</button>
                                    <div class="d-flex justify-content-around mt-3">
                                        <div>
                                            <button class="btn fichaTecnica">Ficha técnica
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18"
                                                    viewBox="0 0 17 18" fill="none">
                                                    <path
                                                        d="M12.0413 6.87496V5.45829C12.0413 4.51898 11.6682 3.61815 11.004 2.95396C10.3398 2.28976 9.43898 1.91663 8.49967 1.91663C7.56037 1.91663 6.65953 2.28976 5.99534 2.95396C5.33115 3.61815 4.95801 4.51898 4.95801 5.45829V6.87496C4.39442 6.87496 3.85392 7.09884 3.45541 7.49736C3.05689 7.89587 2.83301 8.43637 2.83301 8.99996V13.9583C2.83301 14.5219 3.05689 15.0624 3.45541 15.4609C3.85392 15.8594 4.39442 16.0833 4.95801 16.0833H12.0413C12.6049 16.0833 13.1454 15.8594 13.5439 15.4609C13.9425 15.0624 14.1663 14.5219 14.1663 13.9583V8.99996C14.1663 8.43637 13.9425 7.89587 13.5439 7.49736C13.1454 7.09884 12.6049 6.87496 12.0413 6.87496ZM6.37467 5.45829C6.37467 4.89471 6.59856 4.35421 6.99707 3.95569C7.39559 3.55718 7.93609 3.33329 8.49967 3.33329C9.06326 3.33329 9.60376 3.55718 10.0023 3.95569C10.4008 4.35421 10.6247 4.89471 10.6247 5.45829V6.87496H6.37467V5.45829ZM12.7497 13.9583C12.7497 14.1462 12.675 14.3263 12.5422 14.4592C12.4094 14.592 12.2292 14.6666 12.0413 14.6666H4.95801C4.77015 14.6666 4.58998 14.592 4.45714 14.4592C4.3243 14.3263 4.24967 14.1462 4.24967 13.9583V8.99996C4.24967 8.8121 4.3243 8.63193 4.45714 8.49909C4.58998 8.36625 4.77015 8.29163 4.95801 8.29163H12.0413C12.2292 8.29163 12.4094 8.36625 12.5422 8.49909C12.675 8.63193 12.7497 8.8121 12.7497 8.99996V13.9583Z"
                                                        fill="#6D7791" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="btn fichaTecnica">Hoja de seguridad
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18"
                                                    viewBox="0 0 17 18" fill="none">
                                                    <path
                                                        d="M12.0413 6.87496V5.45829C12.0413 4.51898 11.6682 3.61815 11.004 2.95396C10.3398 2.28976 9.43898 1.91663 8.49967 1.91663C7.56037 1.91663 6.65953 2.28976 5.99534 2.95396C5.33115 3.61815 4.95801 4.51898 4.95801 5.45829V6.87496C4.39442 6.87496 3.85392 7.09884 3.45541 7.49736C3.05689 7.89587 2.83301 8.43637 2.83301 8.99996V13.9583C2.83301 14.5219 3.05689 15.0624 3.45541 15.4609C3.85392 15.8594 4.39442 16.0833 4.95801 16.0833H12.0413C12.6049 16.0833 13.1454 15.8594 13.5439 15.4609C13.9425 15.0624 14.1663 14.5219 14.1663 13.9583V8.99996C14.1663 8.43637 13.9425 7.89587 13.5439 7.49736C13.1454 7.09884 12.6049 6.87496 12.0413 6.87496ZM6.37467 5.45829C6.37467 4.89471 6.59856 4.35421 6.99707 3.95569C7.39559 3.55718 7.93609 3.33329 8.49967 3.33329C9.06326 3.33329 9.60376 3.55718 10.0023 3.95569C10.4008 4.35421 10.6247 4.89471 10.6247 5.45829V6.87496H6.37467V5.45829ZM12.7497 13.9583C12.7497 14.1462 12.675 14.3263 12.5422 14.4592C12.4094 14.592 12.2292 14.6666 12.0413 14.6666H4.95801C4.77015 14.6666 4.58998 14.592 4.45714 14.4592C4.3243 14.3263 4.24967 14.1462 4.24967 13.9583V8.99996C4.24967 8.8121 4.3243 8.63193 4.45714 8.49909C4.58998 8.36625 4.77015 8.29163 4.95801 8.29163H12.0413C12.2292 8.29163 12.4094 8.36625 12.5422 8.49909C12.675 8.63193 12.7497 8.8121 12.7497 8.99996V13.9583Z"
                                                        fill="#6D7791" />
                                                </svg>
                                            </button>
                                        </div>

                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                @else
                    <div class="row flex-wrap">

                        @foreach ($productos as $producto)
                            <div class="col-lg-4">
                                <a href="/categoria/{{ $categoria->id }}/{{ $producto->id }}"
                                    class="text-decoration-none">
                                    <div class="d-flex flex-column justify-content-end align-items-start producto p-3">
                                        <div style="height: 19px">
                                            <p class="categoriaText">
                                                {{ strtoupper($categoria['nombre']) }}
                                            </p>
                                        </div>
                                        <div class="w-100 d-flex justify-content-between">
                                            <p class="productoText">{{ $producto->nombre }}</p>
                                            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none">
                                                <path class="arrow-path" d="M5 12H19" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path class="arrow-path" d="M12 5L19 12L12 19" stroke="black"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>


                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>

        </div>



    </div>
@endsection

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    .indicador {
        color: #000;
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 300;
        line-height: 50px;
        padding-top: 20px
    }

    .indicador b {
        color: #000;
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 50px;
    }

    .categoriaSelect {
        color: #000;
        font-family: Inter;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        line-height: 45px;
        /* 250% */
    }

    .categoriaName {
        color: #000;
        font-family: Inter;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: 45px;
    }

    .divContenedor {
        height: 45px;
    }

    .producto {
        height: 144px;
        flex-shrink: 0;
        border-radius: 8px;
        background: #F5F5F5 !important;
    }


    .categoriaText {
        color: var(--Celeste, #29A2C4);
        font-family: Inter;
        font-size: 13px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .categoriaTextProducto {
        color: var(--Celeste, #29A2C4);
        font-family: Inter;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: uppercase;
    }

    .productoText {
        color: #000;
        font-family: Inter;
        font-size: 21px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .productoTextInfo {
        color: #000;
        font-family: Inter;
        font-size: 35px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .productoDescripcion {
        color: #000;
        font-family: Inter;
        font-size: 17px;
        font-style: normal;
        font-weight: 400 !important;
        line-height: 0.6 !important;
    }

    .arrow-icon .arrow-path {
        transition: stroke 0.3s ease;
    }

    .producto:hover .arrow-icon .arrow-path {
        stroke: #29A2C4;
    }

    .contenedor-imagen {
        height: 352px;
        flex-shrink: 0;
    }

    .contenedor-imagen-litro {
        width: 49px;
        height: 45px;
        flex-shrink: 0;
    }

    .litroName {
        color: #000;
        font-family: Inter;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        line-height: 26px;
        /* 173.333% */
    }

    .consultarBtn {
        display: flex;
        width: 100%;
        height: 40px;
        padding: 10px 32px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
        border-radius: 40px !important;
        background: var(--Celeste, #29A2C4) !important;
        color: #FFF !important;
        font-family: Inter !important;
        font-size: 16px !important;
        font-style: normal !important;
        font-weight: 400 !important;
        line-height: normal;
    }

    .fichaTecnica {
        display: flex;
        width: 248px;
        height: 40px;
        padding: 10px 32px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
        border-radius: 40px !important;
        border: 1px solid var(--Celeste, #29A2C4) !important;
        color: #131313 !important;
        font-family: Inter !important;
        font-size: 16px !important;
        font-style: normal !important;
        font-weight: 400 !important;
        line-height: normal;
    }

    @media screen and (max-width: 1000px) {
        .producto {
            margin-top: 20px
        }
    }
</style>
