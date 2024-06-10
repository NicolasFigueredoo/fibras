@extends('layout')

@section('content')
    <div class="container" style="margin-top: 30px; margin-bottom: 230px;">
        @if ($idiomaActive == 'ES')
            <p class="indicador"><b>Inicio</b> > Aplicaciones</p>
        @else
            <p class="indicador"><b>Começar</b> > Aplicações</p>
        @endif

        <div>
            <div class="row flex-wrap categorias" style="row-gap: 20px">
                @php
                    $totalAplicaciones = $aplicaciones->count();
                    $colClass = '';
                    if ($totalAplicaciones == 1) {
                        $colClass = 'col-lg-12';
                    } elseif ($totalAplicaciones == 2) {
                        $colClass = 'col-lg-6';
                    } elseif ($totalAplicaciones == 3) {
                        $colClass = 'col-lg-4';
                    } else {
                        $colClass = 'col-lg-3';
                    }
                @endphp
                @foreach ($aplicaciones as $aplicacion)
                    <div class="{{ $colClass }}">
                        <a href="#modalAplicacion" data-toggle="modal" class="aplicacion-link"
                            data-id="{{ $aplicacion->id }}"
                            data-nombre="{{ $idiomaActive == 'ES' ? $aplicacion->nombre : $aplicacion->nombreAlternativo }}"
                            data-texto="{{ $idiomaActive == 'ES' ?  $aplicacion->texto : $aplicacion->textoAlternativo }}"
                            data-imagen="{{ url('/getImage/' . basename($aplicacion->imagen)) }}"
                            style="text-decoration: none">
                            <div class="d-flex flex-column justify-content-around align-items-center aplicacion">
                                <div class="contenedor-img">
                                    <div class="aplicacion-img"
                                        style="
                                   background-image: url('{{ url('/getImage/' . basename($aplicacion->imagen)) }}');
                                   background-size: cover;
                                   background-repeat: no-repeat;
                                    width: 100%;
                                    height: 100%;
                                ">
                                        <div class="contenedor-textaplicacion">
                                            <p class="textaplicacion">{{ $idiomaActive == 'ES' ? $aplicacion->nombre : $aplicacion->nombreAlternativo }}</p>
                                        </div>
                                    </div>
                                    <div class="svg-overlay"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade modal-xl" id="modalAplicacion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="background: white">
                <div class="row d-flex" >
                    <div class="col-lg-5">
                        <img src="" alt="Imagen de la aplicación" class="img-fluid" id="modalImagen">

                    </div>
                    <div class="col-lg-7">
                        <div class="d-flex flex-column justify-content-start align-items-end m-3" style="cursor: pointer;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: none; border:none; cursor: pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style="cursor: pointer;">
                                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15 9L9 15" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 9L15 15" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  </svg>
                            </button>
                        </div>
                        <div class="m-4">
                            <h5 class="modal-title" id="modalLabel">Título de la aplicación</h5>
                            <div class="modal-title mt-4" style="padding-right: 100px" id="modalTexto">Texto de la aplicación</div>

                        </div>
                    </div>
           
                
             
                </div>
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
line-height: 60px; /* 428.571% */
}

    .aplicacion {
        height: 288px;
        flex-shrink: 0;
    }

    .contenedor-img {
        width: 100%;
        height: 288px;
        flex-shrink: 0;
        position: relative;
    }

    .aplicacion-img {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .aplicacion-img::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .contenedor-textaplicacion {
        position: absolute;
        top: 215px;
        left: 0;
        width: 100%;
        text-align: center;
        color: white;
        z-index: 2;
    }

    .textaplicacion {
        margin: 0;
        color: #FFF;
        text-align: center;
        font-family: "FuturaBook";
        font-size: 20px;
        font-style: normal;
        font-weight: 300 !important;
        line-height: normal;
        text-transform: uppercase;
    }

    .svg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    #modalImagen{
height: 517px;
flex-shrink: 0;
    }

    #modalLabel{
        color: #000;
font-family: "FuturaBook";
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
text-transform: uppercase;
    }

    #modalTexto{
        color: #000;
font-family: "FuturaBook";
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: normal;
    }
</style>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.aplicacion-link').on('click', function() {
            let nombre = $(this).data('nombre');
            let imagen = $(this).data('imagen');
            let texto = $(this).data('texto');

            $('#modalLabel').text(nombre);
            $('#modalTexto').html(texto);
            $('#modalImagen').attr('src', imagen);
        });
    });
</script>
