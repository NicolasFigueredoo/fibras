@extends('layout')

@section('content')
<div class="container">
    <p class="indicador"><b>Inicio</b> / Productos</p>
        <div>
            <div class="row flex-wrap categorias">
                @foreach ($categorias as $categoria)
                    <div class="col-lg-4">
                        <a href="{{ route('categoria', ['id' => $categoria->id, 'idProducto' => 0]) }}"  class="text-decoration-none">
                            <div class="d-flex justify-content-around align-items-center categoria">
                                <div class="contenedor-img">
                                    <div class="categoria-img" style="
                                           background-image: url('{{ url('/getImage/' . basename($categoria->imagen)) }}');
                                              width: 100%;
                                               height: 100%;
                                        
                                        "></div>
                                </div>
                                <div class="contenedor-textCategoria">
                                    <p class="textCategoria">{{ $categoria->nombre }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
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
    .navbar {
        height: 130px;
        background: transparent;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
    }

    .navbar-collapse {
        height: 100px;
    }

    .imagenPrincipal {
        position: relative;
        height: 768px;
        width: 100%;
    }

    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index: 1;
    }

    .background-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.60) 0%, rgba(0, 0, 0, 0.00) 80.27%);
        z-index: 2;
    }

    .imagenNavbar {
        width: 79px;
        height: 103px;
    }

    .nav-link {
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .container {
        position: relative;
        z-index: 1100;
    }

    .textoEncima {
        margin-top: 150px;
        display: flex;
        flex-direction: column;
        align-items: left;
        position: relative;
        z-index: 3;
        color: #FFF;
        font-family: Inter;
        font-style: normal;
        font-weight: 700;
        line-height: 130%;
    }

    .textoProductos {
        color: #000;
        font-family: Inter;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-top: 80px;
        margin-bottom: 58px;

    }

    .categorias {
        margin-bottom: 80px;

    }

    .categoria {
        height: 196px;
        flex-shrink: 0;
        border-radius: 8px;
        background: #F5F5F5;
        mix-blend-mode: color;
        cursor: pointer;
    }


    .contenedor-img {
        width: 121px;
        height: 122px;
        flex-shrink: 0;
    }

    .categoria-img {
        filter: grayscale(1);

    }

    .categoria:hover .categoria-img {
        filter: grayscale(0);

    }

    .textCategoria {
        color: #000;
        font-family: Inter;
        font-size: 22px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .contenedor-textCategoria {
        width: 171px;
    }




  

  





    
</style>