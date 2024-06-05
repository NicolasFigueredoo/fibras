<div>
    

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
                                        stroke="#00245D" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M17.5001 17.5001L13.9167 13.9167" stroke="#00245D" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <span style="color: #00245D">|</span>
                            </div>
                            <div class="w-20">
                                <select class="form-select idioma-select" aria-label="Default select example" >
                                    @foreach ($idiomas as $idioma)
                                        @if ($idioma->activo == 1)
                                            <option value="{{ $idioma->id }}" selected>{{ $idioma->idioma }}
                                            </option>
                                        @else
                                            <option value="{{ $idioma->id }}">{{ $idioma->idioma }}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>


                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            @foreach ($opcionesNavegador as $option)
                                <a class="nav-link text-black" href="{{ $option['url'] }}">{{ $option['name'] }}</a>
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

<style scoped>

.navbar {
        height: 130px;
        background: transparent;
    }


    .form-select {
        width: 70px !important;
        background-color: transparent !important;
        border: none !important;
        outline: none !important;
        cursor: pointer;
        color: #00245D !important;
        font-size: 18px;
        padding-left: 0px;
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


</style>


