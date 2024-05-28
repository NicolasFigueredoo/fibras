@extends('layout')

@section('content')
<div class="container">
    <p class="indicador"><b>Inicio</b> / Contacto</p>

</div>


    <div id="appContacto">
        <formulario></formulario>

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

</style>
