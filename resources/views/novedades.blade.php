@extends('layout')

@section('content')
    <div class="container" style="margin-bottom: 350px; margin-top:30px;">
        @if ($idiomaActive == 'ES')
            <p class="indicador"><b>Inicio</b> > Novedades</p>
        @else
            <p class="indicador"><b>Começar</b> > Novidades</p>
        @endif        

          

                <div class="row flex-wrap sectores" style="margin-top: 50px">
                    @foreach ($novedades as $novedad)
                        <div class="col-lg-4">
                            <a href="{{ route('novedad', ['idNovedad' => $novedad->id]) }}" style="text-decoration: none">

                            <div class="sector">
                                <div class="sector-imagen">
                                    <div
                                        style="background-image: url('{{ url('/getImage/' . basename($novedad->imagen)) }}');
                   background-size: cover; 
                   background-position: center;
                    background-repeat: no-repeat;
                    width: 100%;
                    height: 100%;">
                                    </div>
                                    <div class="contenedor-textSector p-4">
                                        @if ($idiomaActive == 'ES')
                                            <p class="textEtiqueta">{{ $novedad->etiqueta }}</p>
                                            <p class="textSectores">{{ $novedad->titulo }}</p>
                                            <p class="textEpigrafe">{{ $novedad->epigrafe }}</p>
                                            <p class="textLeer">Leer más</p>
                                        @else
                                            <p class="textEtiqueta">{{ $novedad->etiquetaAlternativo }}</p>
                                            <p class="textSectores">{{ $novedad->tituloAlternativo }}</p>
                                            <p class="textEpigrafe">{{ $novedad->epigrafeAlternativo }}</p>
                                            <p class="textLeer">ler mais</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach


                </div>


    </div>
@endsection

<style scoped>
    
   

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
line-height: 60px; /* 428.571% */
}

    .sectores {
        margin-bottom: 100px;
    }

    .sector {
        height: 488px;
        flex-shrink: 0;
        background: #F5F5F5;
        border-radius: 4px;
    }

    .textSectores {
        color: #000;
        font-family: "FuturaBook";
        font-size: 30px;
        font-style: normal;
        font-weight: bold !important;
        line-height: 30px;
        padding-right: 50px;
    }

    .textLeer {
        color: rgba(0, 0, 0, 0.57);
        font-family: "FuturaBook";
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        cursor: pointer;
    }

    .textEtiqueta {
        color: var(--azul, #00245D);
        font-family: "FuturaBookMd";
        font-size: 16px;
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


    .fondoNovedades {
        background: #F5F5F5;
        margin-top: 100px;
        padding-top: 63px;
        padding-bottom: 50px;
    }

    .sector-imagen {
        width: 100%;
        height: 260px;
        background-size: cover;
        background-position: center;
        border-radius: 4px 4px 0px 0px !important;

    }

    .sector-imagen div {
        border-radius: 4px 4px 0px 0px !important;

    }


    .contenedor-textSector {

        display: flex;
        flex-direction: column;
        flex-grow: 1;
        padding: 16px;
    }

</style>
