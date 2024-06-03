<div style="margin-top: 108px; border-top: 1px solid #E6E6E6; fill: rgba(1, 2, 2, 0.10);">
    <div class="container" style="margin-top: 70px">
        <div class="row justify-content-around">

            <div class="col-md-2">
                <div class="contenedorLogo" style="width: 103px; height: 134px; flex-shrink: 0;">
                    <div
                        style="background-image: url('{{ url('/getImage/' . basename($logo[0]['footer'])) }}'); 
                    background-size: contain; 
                    background-position: center; 
                    width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div>
                    <p class="seccionSeccion">Secciones</p>
                </div>
                <div class="d-flex justify-content-between " >
                    <div class="seccionSecciones mt-3">
                        <a href="{{route('nosotros')}}" style="text-decoration: none; color:#000">
                            <p>Nosotros</p>
                        </a>
                        <a href="{{route('servicios')}}" style="text-decoration: none; color:#000">
                            <p>Servicios</p>
                        </a>

                        <a href="{{route('productos')}}" style="text-decoration: none; color:#000">
                            <p>Productos</p>
                        </a>
                     
                    </div>

                    <div class="seccionSecciones mt-3">
                        
                        <a href="{{route('sectores')}}" style="text-decoration: none; color:#000">
                            <p>Sectores</p>
                        </a>
                        
                        <a href="{{route('calidad')}}" style="text-decoration: none; color:#000">
                            <p>Calidad</p>
                        </a>
                        
                        <a href="{{route('contacto')}}" style="text-decoration: none; color:#000">
                            <p>Contacto</p>
                        </a>
              

                    </div>

                </div>

            </div>
            <div class="col-md-3">
                <div class="d-flex flex-column">
                    <p class="seccionSeccion">Suscribite al Newsletter</p>
                    <form class="enviarSub d-flex" action="{{ route('suscribe') }}" method="POST" class="d-flex mt-3">
                        @csrf 
                        <input type="email" name="email" class="form-control" placeholder="Ingresa tu Email" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        <button style="border-radius:0px; background: rgba(217, 217, 217, 0.10);" class="btn" type="submit" id="button-addon2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                <path d="M16.3867 7.72974H1" stroke="#F2AE59" stroke-linecap="round" />
                                <path d="M9.65381 1L16.3872 7.89087L9.65381 14.0911" stroke="#F2AE59" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex flex-column">
                    <p class="seccionSeccion">Contacto</p>

                    <div class="row d-flex mt-3">
                        <div class="col-md-1">
                            <a href="https://maps.app.goo.gl/MLPczGsi4hM8JoqeA" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M20 10C20 16 12 22 12 22C12 22 4 16 4 10C4 7.87827 4.84285 5.84344 6.34315 4.34315C7.84344 2.84285 9.87827 2 12 2C14.1217 2 16.1566 2.84285 17.6569 4.34315C19.1571 5.84344 20 7.87827 20 10Z"
                                        stroke="#F2AE59" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                        stroke="#F2AE59" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>

                        </div>
                        <div class="col-md-10 seccionLink" style="margin-left: 10px">
                            <a href="https://maps.app.goo.gl/MLPczGsi4hM8JoqeA" target="_blank"
                                style="text-decoration: none; color:#000">
                                <p>{{ $contacto[0]['direccion'] }}</p>
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
                                        d="M22 16.9201V19.9201C22.0011 20.1986 21.9441 20.4743 21.8325 20.7294C21.7209 20.9846 21.5573 21.2137 21.3521 21.402C21.1468 21.5902 20.9046 21.7336 20.6407 21.8228C20.3769 21.912 20.0974 21.9452 19.82 21.9201C16.7428 21.5857 13.787 20.5342 11.19 18.8501C8.77382 17.3148 6.72533 15.2663 5.18999 12.8501C3.49997 10.2413 2.44824 7.27109 2.11999 4.1801C2.095 3.90356 2.12787 3.62486 2.21649 3.36172C2.30512 3.09859 2.44756 2.85679 2.63476 2.65172C2.82196 2.44665 3.0498 2.28281 3.30379 2.17062C3.55777 2.05843 3.83233 2.00036 4.10999 2.0001H7.10999C7.5953 1.99532 8.06579 2.16718 8.43376 2.48363C8.80173 2.80008 9.04207 3.23954 9.10999 3.7201C9.23662 4.68016 9.47144 5.62282 9.80999 6.5301C9.94454 6.88802 9.97366 7.27701 9.8939 7.65098C9.81415 8.02494 9.62886 8.36821 9.35999 8.6401L8.08999 9.9101C9.51355 12.4136 11.5864 14.4865 14.09 15.9101L15.36 14.6401C15.6319 14.3712 15.9751 14.1859 16.3491 14.1062C16.7231 14.0264 17.1121 14.0556 17.47 14.1901C18.3773 14.5286 19.3199 14.7635 20.28 14.8901C20.7658 14.9586 21.2094 15.2033 21.5265 15.5776C21.8437 15.9519 22.0122 16.4297 22 16.9201Z"
                                        stroke="#F2AE59" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>

                        </div>
                        <div class="col-md-10 seccionLink" style="margin-left: 10px">
                            <a href="https://wa.me/{{ $numeroWsp }}?text=Hola,%20quiero%20enviar%20un%20mensaje"
                                target="_blank" style="text-decoration: none; color:#000">

                                <p >{{ $contacto[0]['telefono'] }}</p>
                            </a>
                        </div>

                    </div>

                    <div class="row d-flex mt-3">
                        <div class="col-md-1">
                            <a href="mailto:{{ $contacto[0]['email'] }}" style="text-decoration: none; color:#000">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M20 4H4C2.89543 4 2 4.89543 2 6V18C2 19.1046 2.89543 20 4 20H20C21.1046 20 22 19.1046 22 18V6C22 4.89543 21.1046 4 20 4Z"
                                        stroke="#F2AE59" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M22 7L13.03 12.7C12.7213 12.8934 12.3643 12.996 12 12.996C11.6357 12.996 11.2787 12.8934 10.97 12.7L2 7"
                                        stroke="#F2AE59" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <div class="col-md-10 seccionLink" style="margin-left: 10px">
                            <a href="mailto:{{ $contacto[0]['email'] }}" style="text-decoration: none; color:#000">
                                <p >{{ $contacto[0]['email'] }}</p>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="container mt-5" style="border-top: 1px solid #E6E6E6">
        <div class="d-flex justify-content-between mt-3"
            style="color: #000;
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;">
            <p>© Copyright 2024 Real Química. Todos los derechos reservados</p>
            <a href="https://osole.com.ar/" target="_blank" style="text-decoration: none; color:#000">
                <p>By osole</p>
            </a>

        </div>


    </div>

    
    <a href="https://api.whatsapp.com/send?phone={{ $contacto[0]['email'] }}" target="_blank" class="whatsapp-btn mb-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 75 75" fill="none">
            <path d="M37.5 75C58.2107 75 75 58.2107 75 37.5C75 16.7893 58.2107 0 37.5 0C16.7893 0 0 16.7893 0 37.5C0 58.2107 16.7893 75 37.5 75Z" fill="#22BE4A"/>
            <path d="M50.8896 24.0202C43.7496 16.8902 32.1896 16.9002 25.0596 24.0302C19.2296 29.8702 18.0296 38.9002 22.1496 46.0502L19.5596 55.5102L29.2396 52.9602C31.9196 54.4202 34.9196 55.1802 37.9696 55.1802C47.9896 55.3402 56.2396 47.3502 56.3996 37.3302C56.4796 32.3202 54.4796 27.5002 50.8896 24.0202ZM37.9796 52.1102C35.2596 52.1102 32.5896 51.3802 30.2496 50.0002L29.6996 49.6702L23.9596 51.1802L25.4896 45.5802L25.1296 45.0002C20.7696 37.8202 23.0596 28.4702 30.2296 24.1102C37.4096 19.7502 46.7596 22.0402 51.1196 29.2102C52.5296 31.5402 53.2996 34.2002 53.3296 36.9302C53.2396 45.3402 46.3996 52.1102 37.9796 52.1102ZM46.2996 40.7402C45.8496 40.5102 43.5996 39.4102 43.1796 39.2602C42.7596 39.1102 42.4596 39.0302 42.1496 39.4902C41.8396 39.9502 40.9696 40.9702 40.6996 41.2802C40.4296 41.5902 40.1696 41.6302 39.7096 41.4002C37.0296 40.0602 35.2696 39.0102 33.4996 35.9702C33.0296 35.1602 33.9696 35.2202 34.8396 33.4802C34.9596 33.2202 34.9496 32.9202 34.7996 32.6802C34.6896 32.4502 33.7696 30.2002 33.3896 29.2902C33.0196 28.4002 32.6396 28.5302 32.3596 28.5102C32.0996 28.4902 31.7896 28.4902 31.4896 28.4902C31.0196 28.5002 30.5796 28.7102 30.2696 29.0602C29.2296 30.0502 28.6496 31.4302 28.6696 32.8702C28.8196 34.5902 29.4696 36.2302 30.5296 37.5902C30.7596 37.8902 33.7496 42.5002 38.3296 44.4802C41.2296 45.7302 42.3596 45.8402 43.8096 45.6202C44.6896 45.4902 46.5096 44.5202 46.8896 43.4502C47.1896 42.7702 47.2796 42.0102 47.1496 41.2802C47.0396 41.0802 46.7396 40.9602 46.2896 40.7402H46.2996Z" fill="white"/>
          </svg>
    </a>

</div>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    .seccionLink {
        color: #000;
        font-family: Inter;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .seccionSeccion {
        style="color: #000;
                    font-family: Inter;
                    font-size: 18px;
                    font-style: normal;
                    font-weight: 500;
                    line-height: normal;"
    }

    .seccionSecciones p {
        style="color: #000;
                    font-family: Inter;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;"
    }



    .seccionSecciones p:hover{
        font-weight: 500;
        cursor: pointer;

    }

    .seccionLink p:hover{
        font-weight: 500;
        cursor: pointer;

    }

    input{
height: 45px;
flex-shrink: 0;
background: rgba(217, 217, 217, 0.10) !important;
border: none !important;
border-radius: none;
    }
    
    


    @media screen and (max-width: 500px) {
        .enviarSub{
            width: 80%
        }
    }
</style>
