@extends('layout')

@section('content')
    <div>
        <div class="imagenPrincipal">
      

            <div id="carouselExampleIndicators" class="carousel slide w-100" style="height: 600px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @foreach ($sliders as $index => $slider)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            @if ($slider->contentType == 'imagen')

                            <div style=" height: 768px;">
                                <div class="background-image"
                                    style="background-image: url('{{ url('/getImage/' . basename($slider['imagen'])) }}');
                                        background-size: cover; 
                                        background-position: center;
                                        width: 100%;
                                        height: 100%;                                    ">
                                </div>
                                <div class="container carousel-caption textoEncima">
                                    @if($idioma['idioma'] == 'ES')
                                    <div>{!! $slider->texto !!}</div>
                                    <div >
                                        @if ($slider['linkboton'] !== 'none')
                                            <a href="{{ $slider['linkboton'] }}">
                                                <button type="button"
                                                    class="btn botonSlider">{{ $slider['textoboton'] }}</button>
                                            </a>
                                        @else
                                            <a href="{{ route('productos') }}">
                                                <button type="button"
                                                    class="btn botonSlider">{{ $slider['textoboton'] }}</button>
                                            </a>
                                        @endif
                                    </div>
                                    @else
                                    <div>{!! $slider->textoAlternativo !!}</div>
                                    <div >
                                        @if ($slider['linkboton'] !== 'none')
                                            <a href="{{ $slider['linkboton'] }}">
                                                <button type="button"
                                                    class="btn botonSlider">{{ $slider['textobotonAlternativo'] }}</button>
                                            </a>
                                        @else
                                            <a href="{{ route('productos') }}">
                                                <button type="button"
                                                    class="btn botonSlider">{{ $slider['textobotonAlternativo'] }}</button>
                                            </a>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @else
                            <div class="container carousel-caption textoEncima">

                                @if($idioma['idioma'] == 'ES')
                                <div>{!! $slider->texto !!}</div>
                                <div >
                                    @if ($slider['linkboton'] !== 'none')
                                        <a href="{{ $slider['linkboton'] }}">
                                            <button type="button"
                                                class="btn botonSlider">{{ $slider['textoboton'] }}</button>
                                        </a>
                                    @else
                                        <a href="{{ route('productos') }}">
                                            <button type="button"
                                                class="btn botonSlider">{{ $slider['textoboton'] }}</button>
                                        </a>
                                    @endif
                                </div>
                                @else
                                <div>{!! $slider->textoAlternativo !!}</div>
                                <div >
                                    @if ($slider['linkboton'] !== 'none')
                                        <a href="{{ $slider['linkboton'] }}">
                                            <button type="button"
                                                class="btn botonSlider">{{ $slider['textobotonAlternativo'] }}</button>
                                        </a>
                                    @else
                                        <a href="{{ route('productos') }}">
                                            <button type="button"
                                                class="btn botonSlider">{{ $slider['textobotonAlternativo'] }}</button>
                                        </a>
                                    @endif
                                </div>
                                @endif
                        </div>
                            <video class="d-block w-100" style="height: 768px; object-fit: cover;" controls
                            autoplay muted>
                            <source src="{{ url('/getImage/' . basename($slider['imagen'])) }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    
                            @endif


                        </div>
                    @endforeach
                </div>
            </div>

























            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <div class="imagenNavbar">
                                <div
                                    style="background-image: url('{{ url('/getImage/' . basename($logo[0]['header'])) }}'); 
                            background-size: cover; 
                            background-position: center;
                            width: 100%;
                            height: 100%;">
                                </div>
                            </div>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end align-items-end" id="navbarNavAltMarkup">
                            <div class="navbar-nav flex-column">
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z"
                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M17.5001 17.5001L13.9167 13.9167" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-white">|</span>
                                    </div>
                                    <div class="w-20">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>ES</option>
                                            <option value="1">EN</option>
                                        </select>

                                    </div>


                                </div>
                                <div class="d-flex justify-content-end align-items-center">
                                    @foreach ($opcionesNavegador as $option)
                                        <a class="nav-link text-white" href="{{ $option['url'] }}">{{ $option['name'] }}</a>
                                @endforeach
                                    {{-- @auth
                                        <a class="nav-link text-white" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <a class="nav-link text-white" style="cursor: pointer" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 448 512">
                                                <path fill="#ffffff"
                                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                            </svg>
                                        </a>
                                    @endauth --}}
                                </div>


                            </div>
                        </div>
                    </div>
                </nav>
            </div>



        </div>

        <!---CATEGORIAS--->
        <div class="container" style="margin-top: 65px">

            <div>
                <div class="d-flex justify-content-between align-items-center" style="height: 100px">
                    <div>
                        <p class="textoProductos">{{$tituloSeccionProductos}}</p>
                    </div>
                    <div>
                        <a href="{{ route('productos') }}">
                            <button type="button" id="btnProductos" class="btn">{{$textoBoton}}</button>
                        </a>

                    </div>
                </div>
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
                                        @if($idioma['idioma'] == 'ES')
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
        <!---SECCION 1 HOME--->
        <div class="w-100">
            <div class="row contenedorSeccion" style="margin-right: 0px">
                <div class="col-lg-6 contenedorSeccionImagen">
                    <div
                        style="background-image: url('{{ url('/getImage/' . basename($seccion[0]['imagen'])) }}'); 
                background-size: cover; 
                background-position: center;
                background-repeat: no-repeat;
                width: 100%;
                height: 100%;">
                    </div>
                </div>
                <div class="col-lg-6 contenedor-textoSeccion">
                    @if($idioma['idioma'] == 'ES')

                    <p class="tituloSeccion">{!! $seccion[0]['titulo'] !!}</p>

                    <div class="descripcionSeccion">{!! $seccion[0]['texto'] !!}</div>
                    @else
                    <p class="tituloSeccion">{!! $seccion[0]['tituloAlternativo'] !!}</p>

                    <div class="descripcionSeccion">{!! $seccion[0]['textoAlternativo'] !!}</div>
                    @endif
                </div>

            </div>

        </div>

        <!---SECCION SECTORES--->

        <div class="fondoNovedades">

            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="tituloSectores">
                        <p>{{$tituloSeccionProductos}}</p>
                    </div>
                    <div>
                        <a href="{{ route('sectores') }}">
                            <button type="button" id="btnProductos" class="btn">{{$textoBoton}}</button>
                        </a>

                    </div>
                </div>

                <div class="row flex-wrap sectores">
                    @foreach ($novedades as $novedad)
                        <div class="col-lg-4">
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
                                        <p class="textEtiqueta">{{ $novedad->etiqueta }}</p>
                                        <p class="textSectores">{{ $novedad->titulo }}</p>
                                        <p class="textEpigrafe">{{ $novedad->epigrafe }}</p>
                                        <p class="textLeer">Leer más</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>

    </div>




    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
            <div class="modal-content" style="border-radius: 0%;">
                <div class="modal-header">
                    <h5 class="modal-title">Inicio de Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="loginForm">
                        @csrf
                        <div class="mensajeCrear"></div>
                        <div>
                            <label class="form-label textZona">Usuario</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Correo electrónico">
                        </div>
                        <div class="mt-3">
                            <label class="form-label textZona">Contraseña</label>
                            <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                        </div>
                        <div class="d-flex flex-column mt-4">
                            <div>
                                <button type="button" id="botonLogin" class="btn btn-primary"
                                    onclick="loginUser()">Ingresar</button>
                            </div>
                            <div class="mt-3">
                                <button type="button" id="botonRegistrar" class="btn btn-secondary"
                                    onclick="openRegisterModal()">Crear cuenta</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="miModalAccount" class="modal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
            <div class="modal-content" style="border-radius: 0%;">
                <div class="modal-header">
                    <h5 class="modal-title">Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registerForm">
                        @csrf
                        <div>
                            <label class="form-label textZona">Usuario</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Usuario" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label textZona">Email</label>
                            <input type="email" class="form-control" id="mail" name="email"
                                placeholder="Email" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label textZona">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="password"
                                placeholder="Contraseña" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label textZona">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirmar Contraseña" required>
                        </div>
                    </form>
                    <div class="d-flex flex-column mt-4">
                        <div class="mt-3">
                            <button type="button" id="botonRegistrar" class="btn btn-primary"
                                onclick="registerUser()">Crear cuenta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script>
    $('.svg-overlay').on('click', function() {
        $(this).toggleClass('active');
    });
</script>

<style scoped>

    
    .navbar {
        height: 130px;
        background: transparent;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
    }

    .carousel {
        position: absolute !important;
        height: 768px;
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

        width: 100%;
        height: 100%;

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
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.43) 0%, rgba(0, 0, 0, 0.00) 100%), rgba(0, 36, 93, 0.60);
        z-index: 5;
    }

    .imagenNavbar {
        width: 79px;
        height: 103px;
    }

    .nav-link {
        font-family: 'FuturaBook';
        color: #FFF;
        text-align: center;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .container {
        position: relative;
        z-index: 1100;
    }

    .textoEncima {
        margin-top: 250px;
        display: flex;
        flex-direction: column;
        align-items: left;
        position: relative;
        z-index: 3;
        color: #FFF;
        font-family: 'FuturaBook';
        font-style: normal;
        font-weight: 700;
        line-height: 130%;
    }

    .textoProductos {
        color: var(--azul, #00245D);
        font-family: "FuturaBook";
        font-size: 35px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase;
        margin-top: 80px;
        margin-bottom: 58px;

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




    .contenedorSeccion {
        height: 650px;
        background: var(--azul, #00245D);
        display: flex;
        justify-content: space-between;


    }

    .contenedorSeccionImagen {
        height: 100%;
    }

    .contenedor-textoSeccion {
        padding-top: 100px;
        padding-left: 80px !important;
    }

    .tituloSeccion {
        color: #FFF;
        font-family: "FuturaBook";
        font-size: 35px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase;
    }

    .descripcionSeccion {
        padding-top: 30px;
        color: #FFF;
        font-family: "FuturaBook";
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: 33px;
        width: 60%;

    }

    #btnSeccion {
        display: inline-flex;
        margin-top: 30px;
        background: transparent;
        border: 1px solid white;
        border-radius: 40px;
        padding: 10px 32px;
        color: white;
        height: 40px;
        justify-content: center;
        align-items: center;

        font-family: 'FuturaBook';
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .tituloSectores {
        color: var(--azul, #00245D);
        font-family: "FuturaBook";
        font-size: 35px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase;
    }


    #btnSectores {
        display: inline-flex;
        height: 40px;
        background: transparent;
        border-radius: 40px;
        border: 1px solid var(--Naranja, #F2AE59);
        padding: 10px 32px;
        justify-content: center;
        align-items: center;
        color: #131313;
        font-family: 'FuturaBook';
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    #btnSectores:hover {
        color: white;
        background: #F2AE59;
    }

    #btnProductos {
        width: 144px;
        height: 49px;
        flex-shrink: 0;
        border-radius: 37px;
        border: 1px solid var(--azul, #00245D);
        background: #FFF;

        color: var(--azul, #00245D);
        text-align: center;
        font-family: "FuturaBook";
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase
    }

    .sectores {
        margin-bottom: 100px;
    }

    .sector {
        height: 488px;
        flex-shrink: 0;
        margin-top: 63px;
        background: white;
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

    #botonLogin {
        width: 100%;
        padding: 11px 25px;
        justify-content: center;
        align-items: center;
        gap: 20px;
        background: var(--Celeste, #29A2C4);
        border: none;
    }

    #botonLogin:hover {
        background: #FFF;
        border: 1px solid var(--Celeste, #29A2C4);
        color: #29A2C4;

    }

    #botonRegistrar {
        width: 100%;
        padding: 11px 25px;
        justify-content: center;
        align-items: center;
        gap: 20px;
        border: 1px solid var(--Celeste, #29A2C4);
        color: #29A2C4;
        background: #FFF;
    }

    .modal-title {
        color: var(--Celeste, #29A2C4);
        font-family: 'FuturaBook';
        font-size: 30px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .modal-header {
        border: none;
    }

    .form-select {
        background-color: transparent !important;
        border: none !important;
        outline: none !important;
        cursor: pointer;
        color: white !important;
        padding: 0.5em 1em;
        font-size: 1em;
    }

    .form-select option {
        color: #000;
        background-color: #fff;
    }

    .form-select::after {
        content: '\25BC';
        position: absolute;
        right: 1em;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: white !;
        font-size: 1em;
    }

    .botonSlider {
        width: 248px;
        height: 49.067px;
        flex-shrink: 0;
        border-radius: 37px !important;
        background: var(--azul, #00245D) !important;
        color: #FFF !important;
        text-align: center;
        font-family: "FuturaBook";
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-top: 78px;
    }


  
    .carousel-caption {
  
    display: flex;
    justify-content: start;
    flex-direction: column;
    align-items: start;
    text-align: justify !important;
    margin-bottom: 250px;
    
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

.carousel-indicators {
    position: absolute;
    bottom: 10px; 
    left: 50%; 
    transform: translateX(-50%); 
}

.carousel-indicators button {
    width: 91px;
height: 6px !important;
flex-shrink: 0;
    background-color: #fff; 
    border: 2px solid #333; 
    margin: 0 5px; 
}

.carousel-indicators .active {
    background-color: #333; 
}



    @media screen and (max-width: 1000px) {
        .categoria {
            margin-top: 20px
        }

        .contenedorSeccion {
            flex-direction: column;
            height: auto;
        }

        .contenedorSeccionImagen {
            width: 100%;
            height: 650px;
            padding-right: 0px !important;
        }

        .contenedor-textoSeccion {
            width: 100%;
            padding-left: 0;
        }

        .navbar-nav div {
            flex-direction: column;
        }



    }
</style>
