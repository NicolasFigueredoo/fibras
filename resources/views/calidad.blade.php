@extends('layout')

@section('content')
    <div class="container">
        <p class="indicador"><b>Inicio</b> / Calidad</p>
        <div class="row d-flex" style="margin-top: 30px">
            <div class="col-lg-6 contenedor-textoSeccion">
                <p class="tituloSeccion">{!! $seccion[0]['titulo'] !!}</p>
                <div class="descripcionSeccion pt-4">{!! $seccion[0]['texto'] !!}</div>
            </div>
            <div class="col-lg-6 contenedorImagen">
                <div style="background-image: url('{{ url('/getImage/' . basename($seccion[0]['imagen'])) }}'); 
                background-size: cover; 
                background-position: center;
                width: 100%;
                height: 100%;
                border-radius: 8px;">
                </div>
            </div>
        </div>

    </div>

    <div id="appCalidad">
        <dowload></dowload>

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

    .contenedor-textoSeccion {
        padding: 50px;
    }

    .tituloSeccion {
        color: #131313;
        font-family: Inter;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
        line-height: 130%;
    }

    .descripcionSeccion {
        color: #131313;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 0.8 !important;
    }

    .imagenCertificado {
        background-image: url('/img/logoDescarga.png');
        background-size: cover;
        background-position: center;
        width: 40px;
        height: 38px;
        flex-shrink: 0;
    }

    .imagenCertificadoAnmat {
        background-image: url('/img/anmat.png');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        width: 40px;
        height: 38px;
        flex-shrink: 0;
    }

    .input-group-text {
        height: 64px;
        background: white !important;
        border-radius: 0px 8px 8px 0px;
    }

    .inputB {
        width: 89.5%;
        display: flex;
        height: 64px;
        padding: 10px 16px 10px 31px;
        align-items: center;
        gap: 286px;
        flex-shrink: 0;
        background: #F4F4F4 !important;
        border-radius: 0px 8px 8px 0px;
    }

    .txtBoton {
        color: #131313;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 130%;
    }
</style>
