@extends('layout')

@section('content')
<div class="container" style="padding-top: 30px;">
    @if ($idiomaActive == 'ES')
    <p class="indicador"><b>Inicio</b> > Contacto</p>
@else
    <p class="indicador"><b>Começar</b> > Contato</p>
@endif  

</div>


    <div id="appContacto">
        <formulario></formulario>
    </div>


@endsection

<script src="https://www.google.com/recaptcha/api.js?render=6LdIAewpAAAAAFZ3ET1KK0avyL6d2oGkYiWJsq_5"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    .indicador {
        color: #000;
font-family: Montserrat;
font-size: 14px;
font-style: normal;
font-weight: 300;
line-height: 60px;
    }

    .indicador b {
        color: #000;
font-family: Montserrat;
font-size: 14px;
font-style: normal;
font-weight: 500;
line-height: 60px; /* 428.571% */
    }

</style>
