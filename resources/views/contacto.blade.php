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
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .indicador {
        color: #000;
font-family: 'Poppins';
font-size: 14px;
font-style: normal;
font-weight: 300;
line-height: 60px;
    }

    .indicador b {
        color: #000;
font-family: 'Poppins';
font-size: 14px;
font-style: normal;
font-weight: 500;
line-height: 60px; /* 428.571% */
    }

</style>
