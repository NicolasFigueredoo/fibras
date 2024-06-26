<div>


    <nav class="navbar navbar-expand-lg shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end align-items-end" id="navbarNavAltMarkup">
                <div class="navbar-nav flex-column">
                    <div class="d-flex justify-content-end align-items-center gap-2" id="idiomaSelect">

                        <div style="display: flex; align-items: center;">
                            @if ($idiomaActive == 'ES')
                                <select class="form-select3 idioma-select" aria-label="Default select example">
                                @else
                                    <select class="form-select2 idioma-select" aria-label="Default select example">
                            @endif
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
                    <div class="d-flex justify-content-end align-items-center" id="linksSelect">
                        @foreach ($opcionesNavegador as $option)
                            <a class="nav-link text-black {{ $option['active'] ? 'font-weight-bold' : '' }}"
                                href="{{ $option['url'] }}">{{ $option['name'] }}</a>
                        @endforeach

                    </div>


                </div>
            </div>
        </div>
    </nav>

</div>
<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Buscar Productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="searchInput" placeholder="Ingrese su búsqueda">
                <div id="productResults" class="mt-3">
                    @foreach ($productos as $producto)
                        <div class="product-item mb-2" data-name="{{ strtolower($producto->nombre) }}"
                            data-description="{{ strtolower($producto->descripcion) }}">
                            <a href="{{ route('categoria', ['id' => $producto->categorias[0]->id, 'idProducto' => $producto->id]) }}"
                                class="row d-flex text-decoration-none">
                                @foreach ($producto->imagenes as $index => $imagen)
                                    @if ($index == 0)
                                        <div class="col-lg-6" style="width: 200px; height: 200px">
                                            <div class="categoria-img"
                                                style="
                               background-image: url('{{ url('/getImage/' . basename($imagen->path)) }}');
                               background-size: contain;
                                width: 100%;
                                height: 100%;
                                background-repeat: no-repeat;
                            ">
                                            </div>

                                        </div>
                                    @endif
                                @endforeach


                                <div class="col-lg-6 m-3">
                                    @if ($idiomaActive == 'ES')
                                        <p class="categoriaText">{{ $producto->categorias[0]->nombre }}</p>
                                        <p class="categoriaTextProducto">{{ $producto->nombre }}</p>
                                    @else
                                        <p class="categoriaText">{{ $producto->categorias[0]->nombreAlternativo }}</p>
                                        <p class="categoriaTextProducto">{{ $producto->nombreAlternativo }}</p>
                                    @endif
                                </div>

                            </a>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
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

        $('#searchInput').on('input', function() {
            const query = $(this).val().toLowerCase();
            $('.product-item').each(function() {
                const name = $(this).data('name');
                const description = $(this).data('description');
                if (name.includes(query) || description.includes(query)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        let i = 0;

        $('.navbar-toggler').on('click', function() {

            if (i > 0) {
                if ($('#navbarNavAltMarkup').hasClass('collapsing')) {
                    location.reload()

                }

            }

            i++




        });
    });
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .navbar {
        height: 130px;
    }

    .nav-link {
        font-family: "Poppins";

    }

    .categoriaText {
        color: var(--azul, #00245D);
        font-family: "Poppins";
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: uppercase;
    }

    .categoriaTextProducto {
        color: var(--azul, #000);
        font-family: "Poppins";
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: uppercase;
    }


    .form-select3 {

        background-color: transparent !important;
        border: none !important;
        outline: none !important;
        cursor: pointer;
        color: #00245D !important;
        font-size: 18px;
        padding: 0.375rem 0.25rem 0.375rem 0rem !important;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-repeat: no-repeat;
        background-position: right 0px center !important;
        background-image: url('{{ asset('svgs/chevron-down2.svg') }}') !important;
        background-size: 18px !important;
        color: #FFF;
        text-align: right;
        font-family: "Poppins";
        font-size: 18px !important;
        font-style: normal;
        font-weight: 500;
        line-height: normal;

    }

    .form-select3 option {
        color: white !important;
        background-color: #00245D !important;
        text-align: start;
    }

    .form-select3::after {
        content: '\25BC';
        position: absolute;
        right: 1em;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: white !important;
        font-size: 1em;
    }


    .form-select2 {

        background-color: transparent !important;
        border: none !important;
        outline: none !important;
        cursor: pointer;
        color: #00245D !important;
        font-size: 18px;
        padding: 0.375rem 1.20rem 0.375rem 0rem !important;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-repeat: no-repeat;
        background-position: right 0px center !important;
        background-image: url('{{ asset('svgs/chevron-down2.svg') }}') !important;
        text-align: right;
        font-family: "Poppins";
        font-size: 18px !important;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        background-size: 18px !important;

    }


    .form-select2 option {
        color: white !important;
        background-color: #00245D !important;
        text-align: start;

    }

    .form-select2::after {
        content: '\25BC';
        position: absolute;
        right: 1em;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: white !important;
        font-size: 1em;
    }

    .imagenNavbar {
        width: 280px;
        height: 70px;
        flex-shrink: 0;
    }

    .font-weight-bold {
        font-weight: bold;
    }

    @media screen and (max-width: 1000px) {

        .navbar {
            height: auto;
        }

        .tarjeta {
            margin-top: 20px
        }

        #idiomaSelect {
            display: flex !important;
            justify-content: center !important;
            flex-direction: column !important;
        }

        #linksSelect {
            display: flex !important;
            justify-content: center !important;
            flex-direction: column !important;

        }



    }
</style>
