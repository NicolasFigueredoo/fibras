@extends('layout')

@section('content')
    <div class="container" style="padding-top: 30px">
        @if ($idiomaActive == 'ES')
        <p class="indicador"><b>Inicio</b> > Solicitud de presupuesto</p>
    @else
        <p class="indicador"><b>Começar</b> > Orçamento</p>
    @endif      


    <div id="appPresupuesto">
        <presupuesto></presupuesto>
    </div>
      
    </div>
@endsection


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

