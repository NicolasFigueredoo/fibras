@extends('layout')

@section('content')
<div class="container">

    @if($idiomaActive == 'ES')
    <p class="indicador"><b>Inicio</b> > Productos</p>
    @else
    <p class="indicador"><b>Começar</b> > produtos</p>
    @endif
    <div class="container" style="margin-top: 40px">

        <div>
            <div class="row flex-wrap categorias">
                @php
                    $totalCategorias = $categorias->count();
                    $colClass = '';
                    if ($totalCategorias == 1) {
                        $colClass = 'col-lg-12';
                    } elseif ($totalCategorias == 2) {
                        $colClass = 'col-lg-6';
                    } elseif ($totalCategorias == 3) {
                        $colClass = 'col-lg-4';
                    } elseif ($totalCategorias == 4) {
                        $colClass = 'col-lg-3';
                    } else {
                        $colClass = 'col-lg-4';
                    }
                @endphp
                @foreach ($categorias as $categoria)
                    <div class="{{ $colClass }}">
                        <a href="{{ route('categoria', ['id' => $categoria->id, 'idProducto' => 0]) }}"
                            style="text-decoration: none">
                            <div class="d-flex flex-column justify-content-around align-items-center categoria">
                                <div class="contenedor-img">
                                    <div class="categoria-img"
                                        style="
                                       background-image: url('{{ url('/getImage/' . basename($categoria->imagen)) }}');
                                        width: 100%;
                                        height: 100%;
                                    ">
                                    </div>
                                    <div class="svg-overlay"></div>

                                </div>
                                <div class="contenedor-textCategoria">
                                    @if ($idiomaActive == 'ES')
                                        <p class="textCategoria">{{ $categoria->nombre }}</p>
                                    @else
                                        <p class="textCategoria">{{ $categoria->nombreAlternativo }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

        $('.svg-overlay').on('click', function() {
            $(this).toggleClass('active');
        });

        $('.idioma-select').on('change', function() {
            var selectedIdioma = $(this).val();

            $.ajax({
                url: '/changeIdioma',
                method: 'POST',
                data: {
                    idioma: selectedIdioma,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error al enviar el idioma seleccionado:', error);
                }
            });
        });
    });
</script>

<style scoped>

    .indicador{
        color: #000;
font-family: "FuturaBook";
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: 60px; /* 428.571% */
    }



   



  


    .container {
        position: relative;
        z-index: 1100;
    }


    .categorias {
        margin-bottom: 80px;

    }

    .categoria {
        height: 392px;
        flex-shrink: 0;
        border-radius: 8px;
        mix-blend-mode: color;
        cursor: pointer;
    }


    .contenedor-img {
        width: 314px;
        height: 314px;
        flex-shrink: 0;
        overflow: hidden;
        position: relative;

    }

    .categoria-img {
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 100%;
        filter: brightness(80%);
        transition: transform 0.8s ease;
    }

    .categoria:hover .categoria-img {
        transform: scale(1.2);
    }

    .categoria:hover .textCategoria {
        color: #0397D6;

    }

    .textCategoria {
        color: #000;
        font-family: 'FuturaBook';
        font-size: 22px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase;
    }



    .svg-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        background-image: url('{{ asset('svgs/svgCeleste.svg') }}');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .categoria:hover .svg-overlay {
        opacity: 1;
    }

    .svg-overlay {
        transition: opacity 0.3s ease, background-color 0.3s ease;
    }

    .svg-overlay:hover,
    .svg-overlay.active {
        background-image: url('{{ asset('svgs/svgWhite.svg') }}');
        cursor: pointer;
    }

  


    @media screen and (max-width: 1000px) {
        .categoria {
            margin-top: 20px
        }
    }
</style>