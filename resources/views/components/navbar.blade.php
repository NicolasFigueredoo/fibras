<div>
        <nav class="navbar navbar-expand-lg" style="boxShadow: 0 3px 23px 0 rgba(0, 0, 0, 0.1)">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <div class="imagenNavbar" style="width: 79px; height: 103px;">
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
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end align-items-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link text-black "  href="/nosotros" style="{{ Request::path() === 'nosotros' ? 'font-weight: bold;' : '' }}">Nosotros</a>
                        <a class="nav-link text-black "  href="/servicios" style="{{ Request::path() === 'servicios' ? 'font-weight: bold;' : '' }}">Servicios</a>
                        <a class="nav-link text-black "  href="/productos" style="{{ Request::path() === 'productos' ? 'font-weight: bold;' : '' }}">Productos</a>
                        <a class="nav-link text-black "  href="/sectores" style="{{ Request::path() === 'sectores' ? 'font-weight: bold;' : '' }}">Sectores</a>
                        <a class="nav-link text-black "  href="/clientes" style="{{ Request::path() === 'clientes' ? 'font-weight: bold;' : '' }}">Clientes</a>
                        <a class="nav-link text-black "  href="/calidad" style="{{ Request::path() === 'calidad' ? 'font-weight: bold;' : '' }}">Calidad</a>
                        <a class="nav-link text-black "  href="/contacto" style="{{ Request::path() === 'contacto' ? 'font-weight: bold;' : '' }}">Contacto</a>
                    </div>
                </div>
            </div>
        </nav>
</div>
