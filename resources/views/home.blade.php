@extends('layout')

@section('content')
    <div>
        <div class="imagenPrincipal">
            @if ($contentType === 'imagen')
                <div class="background-image"
                    style="background-image: url('{{ url('/getImage/' . basename($slider[0]['imagen'])) }}');">
                </div>
            @elseif ($contentType === 'video')
                <video class="background-video" autoplay loop muted>
                    <source src="{{ url('/getImage/' . basename($slider[0]['imagen'])) }}" type="video/mp4">
                    Tu navegador no soporta la reproducción de videos.
                </video>
            @endif
            <div class="overlay"></div>



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
                            <div class="navbar-nav">
                                <a class="nav-link text-white" href="{{ route('nosotros') }}">Nosotros</a>
                                <a class="nav-link text-white" href="{{ route('servicios') }}">Servicios</a>
                                <a class="nav-link text-white" href="{{ route('productos') }}">Productos</a>
                                <a class="nav-link text-white" href="{{ route('sectores') }}">Sectores</a>
                                <a class="nav-link text-white" href="{{ route('clientes') }}">Clientes</a>
                                <a class="nav-link text-white" href="{{ route('calidad') }}">Calidad</a>
                                <a class="nav-link text-white" href="{{ route('contacto') }}">Contacto</a>
                                @auth
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
                                @endauth


                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="container textoEncima">
                {!! $slider[0]['texto'] !!}
            </div>

        </div>

        <!---CATEGORIAS--->
        <div class="container">

            <div>
                <p class="textoProductos">Productos</p>
                <div class="row flex-wrap categorias">
                    @foreach ($categorias as $categoria)
                        <div class="col-lg-4">
                            <a href="{{ route('categoria', ['id' => $categoria->id, 'idProducto' => 0]) }}"
                                style="text-decoration: none">
                                <div class="d-flex justify-content-around align-items-center categoria">
                                    <div class="contenedor-img">
                                        <div class="categoria-img"
                                            style="
                                           background-image: url('{{ url('/getImage/' . basename($categoria->imagen)) }}');
                                            width: 100%;
                                            height: 100%;
                                        ">
                                        </div>
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
        <!---SECCION 1 HOME--->
        <div class="w-100">
            <div class="row contenedorSeccion" style="margin-right: 0px">
                <div class="col-lg-7 contenedorSeccionImagen">
                    <div
                        style="background-image: url('{{ url('/getImage/' . basename($seccion[0]['imagen'])) }}'); 
                background-size: cover; 
                background-position: center;
                background-repeat: no-repeat;
                width: 100%;
                height: 100%;">
                    </div>
                </div>
                <div class="col-lg-5 contenedor-textoSeccion">
                    <p class="tituloSeccion">{!! $seccion[0]['titulo'] !!}</p>

                    <div class="descripcionSeccion">{!! $seccion[0]['texto'] !!}</div>

                    <a href="{{ route('nosotros') }}">
                        <button type="button" id="btnSeccion" class="btn">Ver más</button>
                    </a>

                </div>

            </div>

        </div>

        <!---SECCION SECTORES--->
        <div class="container" style="margin-top: 100px">
            <div class="d-flex justify-content-between align-items-center">
                <div class="tituloSectores">
                    <p>Sectores</p>
                </div>
                <div>
                    <a href="{{ route('sectores') }}">
                        <button type="button" id="btnSectores" class="btn">Ver todos</button>
                    </a>

                </div>
            </div>

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
                height: 100%;
            
            ">
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
                                    data-bs-toggle="modal" data-bs-target="#miModalAccount">Crear cuenta</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <div id="miModalAccount" class="modal" tabindex="-1">
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

<script>
    function registerUser() {
        let form = document.getElementById('registerForm');
        let formData = new FormData(form);

        axios.post('{{ route('register') }}', formData)
            .then(response => {
                document.querySelector('.mensajeCrear').innerHTML =
                    '<p class="text-success">Usuario registrado con exito!</p>';
                let modal = bootstrap.Modal.getInstance(document.getElementById('miModalAccount'));
                let modalLogin = bootstrap.Modal.getInstance(document.getElementById('loginModal'));

                modal.hide();
                modalLogin.show();

            })
            .catch(error => {
                if (error.response && error.response.data.errors) {
                    let errorMessages = '';
                    for (const [key, value] of Object.entries(error.response.data.errors)) {
                        errorMessages += `${value.join(', ')}<br>`;
                    }

                    let modal = bootstrap.Modal.getInstance(document.getElementById('miModalAccount'));
                    modal.hide();

                    let modalLogin = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
                    modalLogin.show();

                    document.querySelector('.mensajeCrear').innerHTML = '<p class="text-danger">' + errorMessages +
                        '</p>';
                } else {
                    console.error('Error:', error);
                }
            });
    }


    function loginUser() {
        let formData = new FormData(document.getElementById('loginForm'));

        axios.post('{{ route('login') }}', formData)
            .then(response => {
                let modal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
                modal.hide();
                window.location.reload();
            })
            .catch(error => {
                if (error.response && error.response.data.error) {
                    document.querySelector('.mensajeCrear').innerHTML = '<p class="text-danger">' + error.response
                        .data.error + '</p>';
                } else {
                    console.error('Error:', error);
                }
            });
    }
</script>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

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


    .contenedorSeccion {
        height: 650px;
        background: var(--Celeste, #29A2C4);
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
        font-family: Inter;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
        line-height: 130%;
    }

    .descripcionSeccion {
        padding-top: 30px;
        color: #FFF;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 160%;
        width: 80%;

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

        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .tituloSectores {
        color: #000;
        font-family: Inter;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
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
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    #btnSectores:hover {
        color: white;
        background: #F2AE59;


    }

    .sectores {
        margin-bottom: 100px;
    }

    .sector {
        height: 376px;
        flex-shrink: 0;
        margin-top: 63px;
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
        font-family: Inter;
        font-size: 30px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .modal-header {
        border: none;
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



    }
</style>
