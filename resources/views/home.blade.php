@extends('layout')

@section('content')
<div>
    <div class="imagenPrincipal">

        <div class="container">

            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">
                    <div class="imagenNavbar">
                        <div style="background-image: url('{{ url('/getImage/' . basename($logo[0]['navbar'])) }}'); 
                        background-size: cover; 
                        background-position: center;
                        width:100%;
                        height: 100%;"></div>

                    </div>
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                      <a class="nav-link" href="#">Features</a>
                      <a class="nav-link" href="#">Pricing</a>
                      <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </div>
                  </div>
                </div>
              </nav>
            
        </div>






        @if ($contentType === 'imagen')
            <div style="background-image: url('{{ url('/getImage/' . basename($slider[0]['imagen'])) }}'); 
            background-size: cover; 
            background-position: center;
            width:100%;
            height: 100%;"></div>
        @elseif ($contentType === 'video')
            <video controls style="width:100%; height:100%;">
                <source src="{{ url('/getImage/' . basename($slider[0]['imagen'])) }}" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        @endif
    </div>
</div>
@endsection

<style>
    .imagenPrincipal{
        height: 768px;
        width: 100%;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.60) 0%, rgba(0, 0, 0, 0.00) 45.27%);
    }

    .imagenNavbar{
        width: 79px;
        height: 103px;
    }
</style>
