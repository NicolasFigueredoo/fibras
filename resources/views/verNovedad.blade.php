@extends('layout')

@section('content')
    <div class="container" style="margin-top: 30px; margin-bottom: 140px">
        @if ($idiomaActive == 'ES')
            <p class="indicador"><b>Inicio / Novedades / </b> {{ $novedad['titulo'] }} </p>
        @else
            <p class="indicador"><b>Inicio / Novidades / </b> {{ $novedad['tituloAlternativo'] }} </p>
        @endif



        <div class="row d-flex flex-column justify-content-start align-items-start mt-4">
            <div class="col-lg-12">
                <div class="contenedorSeccionImagen">
                    <div
                        style="background-image: url('{{ url('/getImage/' . basename($novedad['imagen'])) }}'); 
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;">
                    </div>
                </div>

            </div>

            <div class="col-lg-12 mt-4">
                @if ($idiomaActive == 'ES')
                    <p class="textEtiqueta">{{ $novedad->etiqueta }}</p>
                    <p class="textSectores mt-3">{{ $novedad->titulo }}</p>
                    <p class="textEpigrafe">{{ $novedad->texto }}</p>
                    <a href="{{ route('novedades') }}" style="text-decoration: none">
                        <button class="btn botonVolver mt-3" type="button">VOLVER</button>
                    </a>
                @else
                    <p class="textEtiqueta">{{ $novedad->etiquetaAlternativo }}</p>
                    <p class="textSectores mt-3">{{ $novedad->tituloAlternativo }}</p>
                    <p class="textEpigrafe">{{ $novedad->textoAlternativo }}</p>
                    <a href="{{ route('novedades') }}" style="text-decoration: none">

                        <button class="btn botonVolver mt-3" type="button">RETORNAR</button>
                    </a>
                @endif

            </div>

        </div>

    </div>
@endsection

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    .indicador {
        color: #000;
        font-family: Montserrat;
        font-size: 14px;
        font-style: normal;
        font-weight: 300;
        line-height: 60px;
    }

    .indicador b {
        color: #000;
        font-family: Montserrat;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 60px;
        /* 428.571% */
    }


    .contenedorSeccionImagen {
        height: 500px;

    }

    .textEtiqueta {
        color: var(--azul, #00245D);
        font-family: "FuturaBookMd";
        font-size: 25px;
        font-style: normal;
        line-height: normal;
        text-transform: uppercase;
        font-weight: bold !important;
        margin-bottom: 4px;

    }

    .textEpigrafe {
        color: #000;
        font-family: "FuturaBook";
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        max-height: 48px;
        /* Dos líneas de texto */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }


    .textSectores {
        color: #000;
        font-family: "FuturaBook";
        font-size: 40px;
        font-style: normal;
        font-weight: bold !important;
        line-height: 30px;
        padding-right: 50px;
    }

    .botonVolver {
        border-radius: 37px !important;
        background: var(--azul, #00245D) !important;
        height: 49px;
        flex-shrink: 0;
        color: #FFF !important;
        text-align: center;
        font-family: "FuturaBook";
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        width: 100px;
    }
</style>
