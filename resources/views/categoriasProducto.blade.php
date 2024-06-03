@extends('layout')

@section('content')
    <div class="container">
        @if ($producto !== null)
            <p class="indicador"><b>Inicio / Servicios / {{ $categoria['nombre'] }} </b> / {{ $producto['nombre'] }} </p>
        @else
            <p class="indicador"><b>Inicio / Servicios</b> / {{ $categoria['nombre'] }}</p>
        @endif



        <div class="row d-flex">
            <div class="col-lg-3">
                <div class="w-100" style="border-bottom: 1px solid #E5E5E5" style="height: 20px">
                </div>
                <div class="w-100 divContenedor" style="border-bottom: 1px solid #E5E5E5">
                    <p class="categoriaSelect">{{ $categoria['nombre'] }}</p>
                </div>

                @foreach ($categorias as $cat)
                    @if ($categoria['nombre'] != $cat['nombre'])
                        <a href="{{ route('categoria', ['id' => $cat->id, 'idProducto' => 0]) }}" style="text-decoration: none;">
                            <div class="w-100 divContenedor" style="border-bottom: 1px solid #E5E5E5">
                                <p class="categoriaName">{{ $cat['nombre'] }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach


            </div>

            <div class="col-lg-9">

                @if ($producto !== null)
                    <div class="row">
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

                                <div class="d-flex text-center gap-3 mt-3" >
                                    @foreach ($litros as $litro)
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
                                     
                                    @endforeach

                                </div>


                                     <div>
                                    <a href="{{route('contacto')}}">
                                        <button class="btn consultarBtn">Consultar</button>
                                    </a>
                                    <div class="row d-flex justify-content-around mt-3">
                                        <div class="col-lg-6">
                                        

                                            @if($producto['fichatecnica'] !== 'none')

                                            <a href="{{ route('downloadFile', ['file' => basename($producto['fichatecnica']), 'downloadName' => 'Catalogo', 'extension' => pathinfo($producto['fichatecnica'], PATHINFO_EXTENSION)]) }}">      
                                                <button class="btn fichaTecnica">Catálogo
                                                </button>
                                            </a>

                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                        

                                            @if($producto['hojaseguridad'] !== 'none')
                                            @if(Auth::check())
                                                <a href="{{ route('downloadFile', ['file' => basename($producto['hojaseguridad']), 'downloadName' => 'Hoja seguridad', 'extension' => pathinfo($producto['hojaseguridad'], PATHINFO_EXTENSION)]) }}">
                                                    <button class="btn fichaTecnica">Hoja Seguridad</button>
                                                </a>
                                            @else
                                            <a href="{{ route('downloadFile', ['file' => basename($producto['hojaseguridad']), 'downloadName' => 'Hoja seguridad', 'extension' => pathinfo($producto['hojaseguridad'], PATHINFO_EXTENSION)]) }}">
                                                <button class="btn fichaTecnica">Hoja Seguridad

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16" fill="none">
                                                        <path d="M10.0413 5.87496V4.45829C10.0413 3.51898 9.6682 2.61815 9.00401 1.95396C8.33982 1.28976 7.43898 0.916626 6.49967 0.916626C5.56037 0.916626 4.65953 1.28976 3.99534 1.95396C3.33115 2.61815 2.95801 3.51898 2.95801 4.45829V5.87496C2.39442 5.87496 1.85392 6.09884 1.45541 6.49736C1.05689 6.89587 0.833008 7.43637 0.833008 7.99996V12.9583C0.833008 13.5219 1.05689 14.0624 1.45541 14.4609C1.85392 14.8594 2.39442 15.0833 2.95801 15.0833H10.0413C10.6049 15.0833 11.1454 14.8594 11.5439 14.4609C11.9425 14.0624 12.1663 13.5219 12.1663 12.9583V7.99996C12.1663 7.43637 11.9425 6.89587 11.5439 6.49736C11.1454 6.09884 10.6049 5.87496 10.0413 5.87496ZM4.37467 4.45829C4.37467 3.89471 4.59856 3.35421 4.99707 2.95569C5.39559 2.55718 5.93609 2.33329 6.49967 2.33329C7.06326 2.33329 7.60376 2.55718 8.00228 2.95569C8.40079 3.35421 8.62467 3.89471 8.62467 4.45829V5.87496H4.37467V4.45829ZM10.7497 12.9583C10.7497 13.1462 10.675 13.3263 10.5422 13.4592C10.4094 13.592 10.2292 13.6666 10.0413 13.6666H2.95801C2.77015 13.6666 2.58998 13.592 2.45714 13.4592C2.3243 13.3263 2.24967 13.1462 2.24967 12.9583V7.99996C2.24967 7.8121 2.3243 7.63193 2.45714 7.49909C2.58998 7.36625 2.77015 7.29163 2.95801 7.29163H10.0413C10.2292 7.29163 10.4094 7.36625 10.5422 7.49909C10.675 7.63193 10.7497 7.8121 10.7497 7.99996V12.9583Z" fill="#6D7791"/>
                                                      </svg>
                                                </button>
                                            </a>                                            @endif
                                        @endif
                                        </div>
                                       
                                       

                                        </div>

                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="col-lg-5">

                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    @if($imagenes)
                                    @foreach ($imagenes as $index => $imagen)
                                        <div class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                                            <div class="contenedor-imagen">
                                          
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
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

                     

                    </div>


                    <div class="mt-5">
                        <p class="titulo">Productos relacionados</p>

                        <div class="row flex-wrap" style="row-gap: 15px">

                            @foreach ($productos as $key => $producto)
                                @if ($key > 1 && $key  < 5)

                                <div class="col-lg-4">
                                    <a href="{{ route('categoria', ['id' => $categoria->id, 'idProducto' => $producto->id]) }}"
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="row flex-wrap" style="row-gap: 15px">

                        @foreach ($productos as $producto)
                            <div class="col-lg-4">
                                <a href="{{ route('categoria', ['id' => $categoria->id, 'idProducto' => $producto->id]) }}"
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
            white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
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
font-size: 15px;
font-style: normal;
font-weight: 400;
line-height: 26px !important; /* 173.333% */
    }

    .arrow-icon .arrow-path {
        transition: stroke 0.3s ease;
    }

    .producto:hover .arrow-icon .arrow-path {
        stroke: #29A2C4;
    }

    .contenedor-imagen {
        height: 362px;
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
        width: 100%;
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

    .titulo {
        color: #000;
        font-family: Inter;
        font-size: 26px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    @media screen and (max-width: 1000px) {
        .producto {
            margin-top: 20px
        }
    }
</style>
