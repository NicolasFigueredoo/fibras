@extends('layout')

@section('content')
    <div style="background:#F4F4F4">
        <div class="container">
            <p class="indicador"><b>Inicio</b> / Servicios</p>


            <div class="row d-flex" style="margin-top: 30px">
                <div class="col-lg-6 contenedorImagen">
                    <div
                        style="background-image: url('{{ url('/getImage/' . basename($seccion[0]['imagen'])) }}'); 
                    background-size: cover; 
                    background-position: center;
                    width: 100%;
                    height: 100%;
                    border-radius: 8px;
    
                    ">
                    </div>
                </div>
                <div class="col-lg-6 contenedor-textoSeccion">
                    <p class="tituloSeccion">{!! $seccion[0]['titulo'] !!}</p>

                    <div class="descripcionSeccion">{!! $seccion[0]['texto'] !!}</div>


                </div>

            </div>

               <div class="row d-flex flex-wrap" style="padding-top: 106px;padding-bottom: 71px; ">
                @foreach ($servicios as $servicio)
                    <div class="justify-content-around col-lg-3">
                        <div class="pt-2 p-3 tarjeta d-flex flex-column justify-content-center align-items-center">

                            <div class="contenedorServicioImagenes">

                                <div
                                    style="background-image: url('{{ url('/getImage/' . basename($servicio->imagen)) }}'); 
                        background-size: cover; 
                        background-position: center;
                        width: 100%;
                        height: 100%;
                        border-radius: 8px;
        
                        ">
                                </div>

                            </div>
                            <p class="textoIcon" style="margin-top: 30px;">{{ $servicio->titulo }}</p>
                        </div>
                    </div>
                @endforeach

            </div>




        </div>

    </div>
    <div class="container" style="padding-bottom: 100px">
        <div class="row d-flex" style="margin-top: 89px;">
            <div class="col-lg-6 contenedor-textoSeccion2">
                <p class="tituloSeccion2" style="padding-right: 130px">{!! $seccion2[0]['titulo'] !!}</p>

                <div class="descripcionSeccion2 pt-5" style="padding-right: 20px">{!! $seccion2[0]['texto'] !!}</div>


            </div>
            <div class="col-lg-6 contenedorImagen">
                <div
                    style="background-image: url('{{ url('/getImage/' . basename($seccion2[0]['imagen'])) }}'); 
            background-size: cover; 
            background-position: center;
            width: 100%;
            height: 100%;
            border-radius: 8px;

            ">
                </div>
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

    .contenedorImagen {
        width: 600px;
        height: 480px;
        flex-shrink: 0;

    }

    .tituloSeccion {
        color: #131313;
        font-family: Inter;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
    }

    .descripcionSeccion {
        color: #131313;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 160% !important;
    }

    .descripcionSeccion2 {
        color: #131313;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 160% !important;
    }

    .contenedor-textoSeccion {
        padding: 50px;
        padding-left: 80px !important;

    }

    .contenedor-textoSeccion2 {
        padding: 50px;

    }

    .tarjeta {
        height: 288px;
        flex-shrink: 0;
        border-radius: 4px;
        background: #FFF;
    }

    .contenedorServicioImagenes {
        width: 60px;
        height: 60px;
        flex-shrink: 0;
    }

    .textoIcon {
        color: #131313;
        text-align: center;
        font-family: Inter;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .tituloSeccion2{
        color: #131313;
font-family: Inter;
font-size: 32px;
font-style: normal;
font-weight: 600;
line-height: 130%; /* 41.6px */
    }

    @media screen and (max-width: 1000px) {

        .tarjeta {
            margin-top: 20px
        }

        .contenedor-textoSeccion {
            padding: 50px;
            padding-left: 15px !important;

        }

    }

    @media screen and (max-width: 800px) {
        .descripcionSeccion {

            line-height: 1 !important;
        }

        .descripcionSeccion2 {

            line-height: 1 !important;
        }
    }
</style>
