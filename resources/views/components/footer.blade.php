<div style="border-top: 1px solid #E6E6E6; background: var(--azul, #00245D);">
    <div class="container" style="margin-top: 70px">
        <div class="row justify-content-around">

            <div class="col-md-2">
                <div class="contenedorLogo" style="width: 206px;
                height: 51px; flex-shrink: 0;">
                    <div
                        style="background-image: url('{{ url('/getImage/' . basename($logo[0]['footer'])) }}'); 
                    background-size: contain; 
                    background-position: center; 
                    width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="border-left: #274575 solid 1px">
                <div>
                    @if($idioma['idioma'] == 'ES')
                    <p class="seccionSeccion">Secciones</p>
                    @else
                    <p class="seccionSeccion">Seções</p>

                    @endif

                </div>
                <div class="d-flex flex-column justify-content-between pt-3 ">
                    @foreach ($opcionesNavegador as $link)
                    <a href="{{ $link['url'] }}" style="text-decoration: none; color:white">
                        <p class="seccionLink">{{ $link['name'] }}</p>
                    </a>
                @endforeach
                </div>

            </div>
            <div class="col-md-2">
                <div class="d-flex flex-column">
                    @if($idioma['idioma'] == 'ES')
                    <p class="seccionSeccion">Suscribite al Newsletter</p>
                    @else
                    <p class="seccionSeccion">Assine o boletim informativo</p>
                    @endif
                    <form class="enviarSub d-flex" action="{{ route('suscribe') }}" method="POST" class="d-flex mt-3">
                        @csrf
                        <input type="email" name="email" class="form-control inputNew"
                            placeholder="Ingresa tu email" aria-label="Recipient's username"
                            aria-describedby="button-addon2" required>
                        <button class="btn inputBotton" type="submit" id="button-addon2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16"
                                fill="none">
                                <path d="M16.3867 7.73364H1" stroke="#0397D6" stroke-width="2" stroke-linecap="round" />
                                <path d="M9.65381 1.00391L16.3872 7.89478L9.65381 14.095" stroke="#0397D6"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex flex-column">
                    @if($idioma['idioma'] == 'ES')
                    <p class="seccionSeccion">Contacto</p>
                    @else
                    <p class="seccionSeccion">Contato</p>
                    @endif

                    <div class="row d-flex mt-3">
                        <div class="col-md-1">
                            <a href="https://maps.app.goo.gl/MLPczGsi4hM8JoqeA" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 4.14286C10.4318 4.14286 8.92776 4.78252 7.81885 5.92114C6.70994 7.05975 6.08696 8.60404 6.08696 10.2143C6.08696 12.4696 7.58658 14.8874 9.30164 16.8685C10.1347 17.8308 10.971 18.6362 11.6002 19.2015C11.7459 19.3324 11.88 19.45 12 19.5534C12.12 19.45 12.2541 19.3324 12.3998 19.2015C13.029 18.6362 13.8653 17.8308 14.6984 16.8685C16.4134 14.8874 17.913 12.4696 17.913 10.2143C17.913 8.60404 17.2901 7.05975 16.1812 5.92114C15.0722 4.78252 13.5682 4.14286 12 4.14286ZM12 20.9286C11.3739 21.7857 11.3737 21.7855 11.3734 21.7854L11.3728 21.7849L11.3711 21.7835L11.3657 21.7794L11.3476 21.7652C11.3322 21.7532 11.3104 21.7361 11.2827 21.714C11.2271 21.6698 11.1476 21.6057 11.0475 21.5231C10.8473 21.3579 10.5642 21.1181 10.2259 20.8141C9.55074 20.2075 8.64791 19.3388 7.74183 18.2922C5.97864 16.2554 4 13.3161 4 10.2143C4 8.03572 4.84285 5.94639 6.34315 4.40591C7.84344 2.86543 9.87827 2 12 2C14.1217 2 16.1566 2.86543 17.6569 4.40591C19.1571 5.94639 20 8.03572 20 10.2143C20 13.3161 18.0214 16.2554 16.2582 18.2922C15.3521 19.3388 14.4493 20.2075 13.7741 20.8141C13.4358 21.1181 13.1527 21.3579 12.9525 21.5231C12.8524 21.6057 12.7729 21.6698 12.7173 21.714C12.6896 21.7361 12.6678 21.7532 12.6524 21.7652L12.6343 21.7794L12.6289 21.7835L12.6272 21.7849L12.6266 21.7854C12.6263 21.7855 12.6261 21.7857 12 20.9286ZM12 20.9286L12.6261 21.7857C12.2551 22.0714 11.7449 22.0714 11.3739 21.7857L12 20.9286ZM12 8.60749C11.1356 8.60749 10.4348 9.32703 10.4348 10.2146C10.4348 11.1022 11.1356 11.8218 12 11.8218C12.8645 11.8218 13.5652 11.1022 13.5652 10.2146C13.5652 9.32703 12.8645 8.60749 12 8.60749ZM8.34785 10.2146C8.34785 8.14357 9.98298 6.46463 12 6.46463C14.0171 6.46463 15.6522 8.14357 15.6522 10.2146C15.6522 12.2857 14.0171 13.9646 12 13.9646C9.98298 13.9646 8.34785 12.2857 8.34785 10.2146Z"
                                        fill="#0397D6" />
                                </svg>
                            </a>

                        </div>
                        <div class="col-md-10" style="margin-left: 10px">
                            <a href="https://maps.app.goo.gl/MLPczGsi4hM8JoqeA" target="_blank"
                                style="text-decoration: none; color:#000">
                                <p class="seccionLink">{{ $contacto[0]['direccion'] }}</p>
                            </a>
                        </div>

                    </div>
                    <div class="row d-flex mt-3">
                        <div class="col-md-1">
                            <a href="https://wa.me/{{ $numeroWsp }}?text=Hola,%20quiero%20enviar%20un%20mensaje"
                                target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M20.5734 16.4334V18.9334C20.5744 19.1655 20.5268 19.3952 20.4339 19.6079C20.3409 19.8205 20.2045 20.0114 20.0335 20.1683C19.8625 20.3252 19.6606 20.4447 19.4407 20.519C19.2209 20.5934 18.9879 20.621 18.7568 20.6001C16.1925 20.3214 13.7293 19.4452 11.5651 18.0417C9.55162 16.7623 7.84454 15.0552 6.5651 13.0417C5.15675 10.8678 4.2803 8.39258 4.00676 5.81675C3.98594 5.5863 4.01333 5.35405 4.08718 5.13477C4.16104 4.91549 4.27974 4.71399 4.43574 4.5431C4.59173 4.37221 4.7816 4.23567 4.99326 4.14218C5.20491 4.04869 5.43371 4.0003 5.6651 4.00008H8.1651C8.56952 3.9961 8.96159 4.13931 9.26823 4.40302C9.57487 4.66674 9.77516 5.03295 9.83176 5.43341C9.93728 6.23347 10.133 7.01902 10.4151 7.77508C10.5272 8.07335 10.5515 8.39751 10.485 8.70915C10.4186 9.02079 10.2641 9.30684 10.0401 9.53341L8.98176 10.5917C10.1681 12.678 11.8955 14.4055 13.9818 15.5917L15.0401 14.5334C15.2667 14.3094 15.5527 14.155 15.8644 14.0885C16.176 14.022 16.5002 14.0463 16.7984 14.1584C17.5545 14.4405 18.34 14.6362 19.1401 14.7417C19.5449 14.7989 19.9146 15.0028 20.1789 15.3147C20.4432 15.6266 20.5836 16.0247 20.5734 16.4334Z"
                                        stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>

                        </div>
                        <div class="col-md-10" style="margin-left: 10px">
                            <a href="https://wa.me/{{ $numeroWsp }}?text=Hola,%20quiero%20enviar%20un%20mensaje"
                                target="_blank" style="text-decoration: none; color:#000">

                                <p class="seccionLink">{{ $contacto[0]['telefono'] }}</p>
                            </a>
                        </div>

                    </div>

                    <div class="row d-flex mt-3">
                        <div class="col-md-1">
                            <a href="mailto:{{ $contacto[0]['email'] }}" style="text-decoration: none; color:#000">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                    viewBox="0 0 24 20" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.95079 5.04988C4.82953 5.15414 4.80014 5.25418 4.80014 5.32143V5.45885L11.5841 9.16538C11.6993 9.227 11.8439 9.26508 12 9.26508C12.1561 9.26508 12.3007 9.22699 12.4159 9.16535C12.4165 9.16503 12.4171 9.1647 12.4178 9.16437L19.1999 5.45885V5.32143C19.1999 5.25418 19.1705 5.15414 19.0492 5.04988C18.926 4.94396 18.7276 4.85714 18.4799 4.85714H5.52013C5.27236 4.85714 5.07398 4.94396 4.95079 5.04988ZM20.9998 5.99854V5.32143C20.9998 3.88801 19.711 3 18.4799 3H5.52013C4.28901 3 3.00018 3.88801 3.00018 5.32143V5.99852C2.99994 6.0109 2.99994 6.02326 3.00018 6.03561V13.6786C3.00018 15.112 4.28901 16 5.52013 16H18.4799C19.711 16 20.9998 15.112 20.9998 13.6786V6.03559C21.0001 6.02326 21.0001 6.0109 20.9998 5.99854ZM19.1999 7.5603L13.2508 10.8106C12.8662 11.0178 12.4332 11.1222 12 11.1222C11.5668 11.1222 11.1338 11.0178 10.7492 10.8106L10.7445 10.8081L4.80014 7.5603V13.6786C4.80014 13.7458 4.82953 13.8459 4.95079 13.9501C5.07398 14.056 5.27236 14.1429 5.52013 14.1429H18.4799C18.7276 14.1429 18.926 14.056 19.0492 13.9501C19.1705 13.8459 19.1999 13.7458 19.1999 13.6786V7.5603Z"
                                        fill="#0397D6" />
                                </svg>
                            </a>
                        </div>
                        <div class="col-md-10" style="margin-left: 10px">
                            <a href="mailto:{{ $contacto[0]['email'] }}" style="text-decoration: none; color:#000">
                                <p class="seccionLink">{{ $contacto[0]['email'] }}</p>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="mt-5 footerTwo">
        <div class="container d-flex justify-content-between mt-3">
            @if($idioma['idioma'] == 'ES')

            <p class="derechos">© Copyright 2024 Fibras Argentinas. Todos los derechos reservados</p>
            @else
            <p class="derechos">© Copyright 2024 Fibras Argentinas. Todos os direitos reservados</p>
            @endif
            <a href="https://osole.com.ar/" target="_blank" style="text-decoration: none; color:#000">
                <p class="derechos">By osole</p>
            </a>

        </div>


    </div>


    <a href="https://api.whatsapp.com/send?phone={{ $contacto[0]['email'] }}" target="_blank"
        class="whatsapp-btn mb-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 75 75" fill="none">
            <path
                d="M37.5 75C58.2107 75 75 58.2107 75 37.5C75 16.7893 58.2107 0 37.5 0C16.7893 0 0 16.7893 0 37.5C0 58.2107 16.7893 75 37.5 75Z"
                fill="#22BE4A" />
            <path
                d="M50.8896 24.0202C43.7496 16.8902 32.1896 16.9002 25.0596 24.0302C19.2296 29.8702 18.0296 38.9002 22.1496 46.0502L19.5596 55.5102L29.2396 52.9602C31.9196 54.4202 34.9196 55.1802 37.9696 55.1802C47.9896 55.3402 56.2396 47.3502 56.3996 37.3302C56.4796 32.3202 54.4796 27.5002 50.8896 24.0202ZM37.9796 52.1102C35.2596 52.1102 32.5896 51.3802 30.2496 50.0002L29.6996 49.6702L23.9596 51.1802L25.4896 45.5802L25.1296 45.0002C20.7696 37.8202 23.0596 28.4702 30.2296 24.1102C37.4096 19.7502 46.7596 22.0402 51.1196 29.2102C52.5296 31.5402 53.2996 34.2002 53.3296 36.9302C53.2396 45.3402 46.3996 52.1102 37.9796 52.1102ZM46.2996 40.7402C45.8496 40.5102 43.5996 39.4102 43.1796 39.2602C42.7596 39.1102 42.4596 39.0302 42.1496 39.4902C41.8396 39.9502 40.9696 40.9702 40.6996 41.2802C40.4296 41.5902 40.1696 41.6302 39.7096 41.4002C37.0296 40.0602 35.2696 39.0102 33.4996 35.9702C33.0296 35.1602 33.9696 35.2202 34.8396 33.4802C34.9596 33.2202 34.9496 32.9202 34.7996 32.6802C34.6896 32.4502 33.7696 30.2002 33.3896 29.2902C33.0196 28.4002 32.6396 28.5302 32.3596 28.5102C32.0996 28.4902 31.7896 28.4902 31.4896 28.4902C31.0196 28.5002 30.5796 28.7102 30.2696 29.0602C29.2296 30.0502 28.6496 31.4302 28.6696 32.8702C28.8196 34.5902 29.4696 36.2302 30.5296 37.5902C30.7596 37.8902 33.7496 42.5002 38.3296 44.4802C41.2296 45.7302 42.3596 45.8402 43.8096 45.6202C44.6896 45.4902 46.5096 44.5202 46.8896 43.4502C47.1896 42.7702 47.2796 42.0102 47.1496 41.2802C47.0396 41.0802 46.7396 40.9602 46.2896 40.7402H46.2996Z"
                fill="white" />
        </svg>
    </a>

</div>


<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    .seccionLink {
        color: #FFF;
        font-family: "Futura Bk BT";
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        opacity: 0.8;

    }

    .seccionSeccion {
        color: #FFF;
        font-family: "Futura Bk BT";
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }



    .seccionSecciones p:hover {
        font-weight: 500;
        cursor: pointer;

    }

    .seccionLink:hover {
        font-weight: 500;
        cursor: pointer;
        color: white !important;
        opacity: 1;

    }

    .inputNew {
        height: 45px;
        flex-shrink: 0;
        background: white !important;
        border: none !important;
        border-radius: 12px 0px 0px 12px !important;
    }

    .inputBotton {
        border-radius: 0px 12px 12px 0px !important;
        background: white !important;

    }

    .derechos {
        color: #FFF;
        font-family: "Futura Bk BT";
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        opacity: 0.8;

    }

    .derechos:hover{
        opacity: 1;

    }

    .footerTwo {
        background: #002157;
        padding-top: 20px;
    }




    @media screen and (max-width: 500px) {
        .enviarSub {
            width: 80%
        }
    }
</style>
