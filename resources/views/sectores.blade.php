@extends('layout')

@section('content')
    <div class="container">
        <p class="indicador"><b>Inicio</b> / Sectores</p>

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
                                height: 100%;">
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
@endsection

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    .sectores {
        margin-bottom: 100px;
    }

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

    .sector {
        height: 376px;
        flex-shrink: 0;
        margin-top: 33px;
        cursor: pointer;
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
</style>
