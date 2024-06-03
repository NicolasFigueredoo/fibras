<div>
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <div class="imagenNavbar">
                    <div
                        style="background-image: url('{{ url('/getImage/' . basename($logo[0]['navbar'])) }}'); 
                background-size: cover; 
                background-position: center;
                width: 100%;
                height: 100%;">
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbartwp" aria-controls="navbartwp" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end align-items-end" id="navbartwp">
                <div class="navbar-nav">
                    <a class="nav-link text-black "  href="{{route('nosotros')}}" style="{{ Request::path() === 'nosotros' ? 'font-weight: bold;' : '' }}">Nosotros</a>
                    <a class="nav-link text-black "  href="{{route('servicios')}}" style="{{ Request::path() === 'servicios' ? 'font-weight: bold;' : '' }}">Servicios</a>
                    <a class="nav-link text-black "  href="{{route('productos')}}" style="{{ Request::path() === 'productos' ? 'font-weight: bold;' : '' }}">Productos</a>
                    <a class="nav-link text-black "  href="{{route('sectores')}}" style="{{ Request::path() === 'sectores' ? 'font-weight: bold;' : '' }}">Rubros</a>
                    <a class="nav-link text-black "  href="{{route('clientes')}}" style="{{ Request::path() === 'clientes' ? 'font-weight: bold;' : '' }}">Clientes</a>
                    <a class="nav-link text-black "  href="{{route('calidad')}}" style="{{ Request::path() === 'calidad' ? 'font-weight: bold;' : '' }}">Calidad</a>
                    <a class="nav-link text-black "  href="{{route('contacto')}}" style="{{ Request::path() === 'contacto' ? 'font-weight: bold;' : '' }}">Contacto</a>
                    @auth 
                        <a class="nav-link text-black" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a class="nav-link text-black" style="cursor: pointer" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 448 512">
                                <path fill="#000"
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                            </svg>
                        </a>
                    @endauth


                </div>
            </div>
        </div>
    </nav>

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
</div>


<style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

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
    .navbar {
        height: 130px;
        background: transparent;
    }

    .navbar-collapse {
        height: 100px;
    }

    .imagenPrincipal {
        height: 768px;
        width: 100%;
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

    
</style>



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
                window.location.reload();            })
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