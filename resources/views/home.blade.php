@extends('layout')

@section('content')
<div>
    <div class="imagenPrincipal">
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
</style>
