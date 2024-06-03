@extends('layout')

@section('content')
    <div class="container">
        <p class="indicador"><b>Inicio</b> / Servicios</p>

        <div class="row d-flex flex-wrap" style="margin-top: 40px; row-gap: 15px">
            @foreach ($clientes as $cliente)
                <div class="justify-content-around col-md-3">
                    <div class="tarjeta d-flex justify-content-center align-items-center">

                        <a href="{{$cliente->link}}" target="_blank">

                            <div class="contenedorImagenes">
    
                                <div
                                    style="background-image: url('{{ url('/getImage/' . basename($cliente->imagen)) }}'); 
                                background-size: contain; 
                                background-repeat: no-repeat; 
                                background-position: center;
                                width: 100%;
                                height: 100%;
                                ">
                                </div>
    
                            </div>
                        </a>

                    </div>
                </div>
            @endforeach

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

    .tarjeta {
        height: 288px;
        flex-shrink: 0;
        border-radius: 8px;
        border: 1px solid #DCDCDC;
        background: #FFF;
    }

    .contenedorImagenes {
        width: 132px;
        height: 167px;
        flex-shrink: 0;
    }

    @media screen and (max-width: 1000px) {
        .tarjeta{
            margin-top: 20px;
        }
    }
</style>
