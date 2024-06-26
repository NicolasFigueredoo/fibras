@extends('layout')

@section('content')
    <div class="container" style="margin-top: 30px; margin-bottom: 174px">

        @if ($producto !== null)
            @if ($idiomaActive == 'ES')
                <p class="indicador"><b>Inicio > Productos > {{ $categoria['nombre'] }} </b> > {{ $producto['nombre'] }} </p>
            @else
                <p class="indicador"><b>Começar > Produtos > {{ $categoria['nombreAlternativo'] }} </b> >
                    {{ $producto['nombreAlternativo'] }} </p>
            @endif
        @else
            @if ($idiomaActive == 'ES')
                <p class="indicador"><b>Inicio > Productos</b> > {{ $categoria['nombre'] }}</p>
            @else
                <p class="indicador"><b>Começar > Produtos</b> > {{ $categoria['nombreAlternativo'] }}</p>
            @endif
        @endif



        <div class="row d-flex">
            <div class="col-lg-3">

                <div class="w-100 divContenedor">
                    @if ($idiomaActive == 'ES')
                        <p class="categoriaSelect">{{ $categoria['nombre'] }}</p>
                    @else
                        <p class="categoriaSelect">{{ $categoria['nombreAlternativo'] }}</p>
                    @endif
                </div>

                @foreach ($categorias as $cat)
                    @if ($categoria['nombre'] != $cat['nombre'])
                        <a href="{{ route('categoria', ['id' => $cat->id, 'idProducto' => 0]) }}"
                            style="text-decoration: none;">
                            <div class="w-100 divContenedor">
                                @if ($idiomaActive == 'ES')
                                    <p class="categoriaName">{{ $cat['nombre'] }}</p>
                                @else
                                    <p class="categoriaName">{{ $cat['nombreAlternativo'] }}</p>
                                @endif
                            </div>
                        </a>
                    @endif
                @endforeach


            </div>

            <div class="col-lg-9">

                @if ($producto !== null)
                    <div class="row">
                        <div class="col-lg-5">

                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    @if ($imagenes)
                                        @foreach ($imagenes as $index => $imagen)
                                            <div class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                                                <div class="contenedor-imagen2">
                                                    <div
                                                        style="background-image: url('{{ url('/getImage/' . basename($imagen->path)) }}');
                                                           background-size: cover; 
                                                           background-position: center;
                                                           width: 100%;
                                                           height: 100%;
                                                    ">
                                                    </div>
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
                        <div class="col-lg-7">
                            <div class="d-flex flex-column">
                                @if ($idiomaActive == 'ES')
                                    <div>
                                        <div>
                                            <span class="categoriaTextProducto1" style="color: #00245D;">
                                                {{ strtoupper($categoria['nombre']) }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="productoTextInfo">
                                                {{ $producto['nombre'] }}

                                            </span>
                                        </div>

                                        <div class="productoDescripcion pt-5">
                                            <label class="pb-2" id="labelDescripcion"
                                                for="">Descripcion:</label>
                                            {!! $producto['texto'] !!}

                                        </div>

                                    </div>


                                    <div style="margin-top: 50px;">
                                        <a href="{{ route('contacto') }}">
                                            <button type="button" class="btn botonConsultar">CONSULTA</button>
                                        </a>
                                    </div>
                                @else
                                    <div>
                                        <div>
                                            <p class="categoriaTextProducto1" style="color: #00245D;">
                                                {{ strtoupper($categoria['nombreAlternativo']) }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="productoTextInfo">
                                                {{ $producto['nombreAlternativo'] }}

                                            </p>
                                        </div>

                                        <div class="productoDescripcion pt-5">
                                            <label class="pb-2" id="labelDescripcion"
                                                for="">Descrição:</label>
                                            {!! $producto['textoAlternativo'] !!}

                                        </div>
                                    </div>

                                    <div style="margin-top: 50px;">
                                        <a href="{{ route('contacto') }}">

                                            <button type="button" class="btn botonConsultar">CONSULTA</button>
                                        </a>
                                    </div>
                                @endif



                            </div>


                        </div>
                    </div>

                    <div class="mt-5">
                        @if ($idiomaActive == 'ES')
                            <p class="titulo">Productos relacionados</p>
                        @else
                            <p class="titulo">Produtos relacionados</p>
                        @endif

                        <div class="row flex-wrap" style="row-gap: 15px">

                            @foreach ($productos as $index => $producto)
                                @if ($index > 1 && $index < 5)
                                    <div class="col-lg-4">
                                        <a href="{{ route('categoria', ['id' => $categoria->id, 'idProducto' => $producto->id]) }}"
                                            class="text-decoration-none">
                                            @foreach ($producto->imagenes as $index => $imagen)
                                                @if ($index == 0)
                                                    <div class="contenedor-imagen">
                                                        <div class="categoria-img"
                                                            style="
                                           background-image: url('{{ url('/getImage/' . basename($imagen->path)) }}');
                                           background-size: cover;
                                           backround-repeat: no-repeat;
                                            width: 100%;
                                            height: 100%;
                                        ">
                                                        </div>

                                                    </div>
                                                @endif
                                            @endforeach


                                            <div class="m-3">
                                                @if ($idiomaActive == 'ES')
                                                    <p class="categoriaText">{{ $categoria->nombre }}</p>
                                                    <p class="productoTextInfoRelacion">{{ $producto->nombre }}</p>
                                                @else
                                                    <p class="categoriaText">{{ $categoria->nombreAlternativo }}</p>
                                                    <p class="productoTextInfoRelacion">{{ $producto->nombreAlternativo }}
                                                    </p>
                                                @endif
                                            </div>

                                        </a>

                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>


            </div>
        @else
            <div class="row flex-wrap" style="row-gap: 15px; margin-bottom: 256px; cursor:pointer">

                @foreach ($productos as $producto)
                    <div class="col-lg-4">
                        <a href="{{ route('categoria', ['id' => $categoria->id, 'idProducto' => $producto->id]) }}"
                            class="text-decoration-none">
                            @foreach ($producto->imagenes as $index => $imagen)
                                @if ($index == 0)
                                    <div class="contenedor-imagen">
                                        <div class="categoria-img"
                                            style="
                               background-image: url('{{ url('/getImage/' . basename($imagen->path)) }}');
                               background-size: cover;
                               backround-repeat: no-repeat;
                                width: 100%;
                                height: 100%;
                            ">
                                        </div>

                                    </div>
                                @endif
                            @endforeach


                            <div class="m-3">
                                @if ($idiomaActive == 'ES')
                                    <p class="categoriaText">{{ $categoria->nombre }}</p>
                                    <p class="categoriaTextProducto">{{ $producto->nombre }}</p>
                                @else
                                    <p class="categoriaText">{{ $categoria->nombreAlternativo }}</p>
                                    <p class="categoriaTextProducto">{{ $producto->nombreAlternativo }}</p>
                                @endif
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
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .indicador {
        color: #000;
        font-family: 'Poppins';
        font-size: 14px;
        font-style: normal;
        font-weight: 300;
        line-height: 60px;
    }

    .indicador b {
        color: #000;
        font-family: 'Poppins';
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 60px;
        /* 428.571% */
    }

    .categoriaSelect {
        color: var(--azul, #00245D);
        font-family: 'Poppins';
        font-size: 18px;
        font-style: normal;
        font-weight: bold !important;
        line-height: 40px;
        /* 222.222% */
        text-transform: uppercase;
    }

    .categoriaName {
        color: #000;
        font-family: 'Poppins';
        font-size: 18px;
        font-style: normal;
        font-weight: 400 !important;
        line-height: 40px;
        text-transform: uppercase;

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
        color: var(--azul, #00245D);
        font-family: 'Poppins';
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: uppercase;
    }

    .categoriaTextProducto {
        color: var(--azul, #00245D);
        font-family: 'Poppins';
        font-size: 22px;
        font-style: normal;
        font-weight: 500 !important;
        line-height: normal;
        text-transform: uppercase;
    }

    .productoText {
        color: #000;
        font-family: 'Poppins';
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
        font-family: 'Poppins';
        font-size: 35px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .productoDescripcion {
        color: #000;
        font-family: 'Poppins';
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    #labelDescripcion {
        color: #000;
        font-family: 'Poppins';
        font-size: 17px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .arrow-icon .arrow-path {
        transition: stroke 0.3s ease;
    }

    .producto:hover .arrow-icon .arrow-path {
        stroke: #29A2C4;
    }

    .contenedor-imagen {
        height: 273px;
        flex-shrink: 0;
    }

    .contenedor-imagen2 {
        height: 392px;
        flex-shrink: 0;
    }

    .contenedor-img {
        height: 273px;
        flex-shrink: 0;
    }

    .titulo {
        color: #000;
        font-family: 'Poppins';
        font-size: 30px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .productoTextInfoRelacion {
        color: #000;
        font-family: 'Poppins';
        font-size: 22px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .botonConsultar {
        width: 100%;
        height: 49px !important;
        flex-shrink: 0;
        border-radius: 37px !important;
        background: var(--azul, #00245D) !important;
        color: #FFF !important;
        text-align: center;
        font-family: 'Poppins';
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .categoriaTextProducto1 {
        color: var(--azul, #00245D);
font-family: "Poppins";
font-size: 18px;
font-style: normal;
font-weight: 700;
line-height: normal;
text-transform: uppercase;
    }

    @media screen and (max-width: 1000px) {
        .producto {
            margin-top: 20px
        }
    }
</style>
