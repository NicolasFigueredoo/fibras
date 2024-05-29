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

    <div class="container">
        <div style="margin-top: 80px" class="row d-flex justify-content-between align-items-center">
                 <div class="col-lg-6">
                     <div  class="input-group mb-3 d-flex justify-content-start align-items-center">
                         <span class="input-group-text" id="basic-addon1">
                             <div class="imagenCertificado"></div>
                         </span>
                         <a href="{{ route('downloadFile', ['file' => basename($seccion[0]['textoboton']), 'downloadName' => 'Certificado_Anmat', 'extension' => pathinfo($seccion[0]['textoboton'], PATHINFO_EXTENSION)]) }}" class="btn inputB">
                            <div class="d-flex justify-content-between align-items-center">
                                 <p class="m-3 txtBoton">Políticas de calidad</p>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                     <path d="M12 17V3" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M6 11L12 17L18 11" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M19 21H5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                 </svg>
                             </div>
                         </a>
                     </div>
                 </div>
     
                 <div class="col-lg-6">
                     <div class="input-group mb-3 d-flex justify-content-start align-items-center">
                         <span class="input-group-text" id="basic-addon1">
                             <div class="imagenCertificadoAnmat"></div>
                         </span>
                         <a href="{{ route('downloadFile', ['file' => basename($seccion[0]['link']), 'downloadName' => 'Certificado_Anmat', 'extension' => pathinfo($seccion[0]['link'], PATHINFO_EXTENSION)]) }}" class="btn inputB">
                            <div class="d-flex justify-content-between align-items-center">
                                 <p class="m-3 txtBoton">Certificado Anmat</p>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                     <path d="M12 17V3" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M6 11L12 17L18 11" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M19 21H5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                 </svg>
                             </div>
                         </a>
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
        color: #000;
font-family: Inter;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 160% !important; /* 25.6px */
padding-right: 80px;
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
        width: 88%;
        display: flex;
        height: 64px;
        padding: 10px 16px 10px 31px;
        align-items: center;
        gap: 286px;
        flex-shrink: 0;
        background: #F4F4F4 !important;
        border-top:  1px solid #EAEAEA !important;
        border-bottom:  1px solid #EAEAEA !important;
        border-right:  1px solid #EAEAEA !important;

        border-radius: 0px 8px 8px 0px !important;
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
