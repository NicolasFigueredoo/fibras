<div style="margin-top: 108px; border-top: 1px solid #E6E6E6; fill: rgba(1, 2, 2, 0.10);">
    <div class="container" style="margin-top: 70px">
        <div class="row justify-content-around">

            <div class="col-md-2">
                <div class="contenedorLogo" style="width: 103px; height: 134px; flex-shrink: 0;">
                    <div style="background-image: url('{{ url('/getImage/' . basename($logo[0]['footer'])) }}'); 
                    background-size: contain; 
                    background-position: center; 
                    width: 100%; height: 100%;"></div>
                </div>
            </div>
            <div class="col-md-2">
                <div>
                    <p style="color: #000;
                    font-family: Inter;
                    font-size: 18px;
                    font-style: normal;
                    font-weight: 500;
                    line-height: normal;">Secciones</p>
                </div>
                <div class="d-flex justify-content-between" style="margin-top: 43px">
                    <div style="color: #000;
                    font-family: Inter;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;">
                        <p>Nosotros</p>
                        <p>Servicios</p>
                        <p>Productos</p>
        
                    </div>
    
                    <div style="color: #000;
                    font-family: Inter;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;">
                        <p>Sectores</p>
                        <p>Calidad</p>
                        <p>Contacto</p>
        
                    </div>
    
                </div>
    
            </div>
            <div class="col-md-3">
                <div class="d-flex flex-column">
                    <p style="color: #000;
                    font-family: Inter;
                    font-size: 18px;
                    font-style: normal;
                    font-weight: 500;
                    line-height: normal;">Suscribite al Newsletter</p>
                    <div class="d-flex">
                        <input type="email"
                            style="border: none;border-radius: 0%; color: white; background: rgba(217, 217, 217, 0.10);"
                            class="form-control" placeholder="Ingresa tu Email"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button style="border-radius:0px; background: rgba(217, 217, 217, 0.10);" class="btn" type="button" id="button-addon2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                <path d="M16.3867 7.72974H1" stroke="#F2AE59" stroke-linecap="round"/>
                                <path d="M9.65381 1L16.3872 7.89087L9.65381 14.0911" stroke="#F2AE59" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
    
    
                        </button>
                    </div>
                </div>
    
            </div>
            <div class="col-md-3">
                <div class="d-flex flex-column">
                    <p style="color: #000;
                    font-family: Inter;
                    font-size: 18px;
                    font-style: normal;
                    font-weight: 500;
                    line-height: normal;">Contacto</p>
    
                    <div class="row d-flex" style="color: #000;
                    font-family: Inter;
                    font-size: 15px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;">
                        <div class="col-md-1">
                            <a href="https://maps.app.goo.gl/MLPczGsi4hM8JoqeA" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M20 10C20 16 12 22 12 22C12 22 4 16 4 10C4 7.87827 4.84285 5.84344 6.34315 4.34315C7.84344 2.84285 9.87827 2 12 2C14.1217 2 16.1566 2.84285 17.6569 4.34315C19.1571 5.84344 20 7.87827 20 10Z" stroke="#F2AE59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#F2AE59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  </svg>
                            </a>
    
                        </div>
                        <div class="col-md-11">
                            <a href="https://maps.app.goo.gl/MLPczGsi4hM8JoqeA" target="_blank" style="text-decoration: none; color:#000">
                            <p>{{$contacto[0]['direccion']}}</p>
                            </a>
                        </div>
    
                    </div>
                    <div class="row d-flex mt-3" style="color: #000;
                    font-family: Inter;
                    font-size: 15px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;">
                        <div class="col-md-1">
                            <a href="https://wa.me/{{ $numeroWsp }}?text=Hola,%20quiero%20enviar%20un%20mensaje" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M22 16.9201V19.9201C22.0011 20.1986 21.9441 20.4743 21.8325 20.7294C21.7209 20.9846 21.5573 21.2137 21.3521 21.402C21.1468 21.5902 20.9046 21.7336 20.6407 21.8228C20.3769 21.912 20.0974 21.9452 19.82 21.9201C16.7428 21.5857 13.787 20.5342 11.19 18.8501C8.77382 17.3148 6.72533 15.2663 5.18999 12.8501C3.49997 10.2413 2.44824 7.27109 2.11999 4.1801C2.095 3.90356 2.12787 3.62486 2.21649 3.36172C2.30512 3.09859 2.44756 2.85679 2.63476 2.65172C2.82196 2.44665 3.0498 2.28281 3.30379 2.17062C3.55777 2.05843 3.83233 2.00036 4.10999 2.0001H7.10999C7.5953 1.99532 8.06579 2.16718 8.43376 2.48363C8.80173 2.80008 9.04207 3.23954 9.10999 3.7201C9.23662 4.68016 9.47144 5.62282 9.80999 6.5301C9.94454 6.88802 9.97366 7.27701 9.8939 7.65098C9.81415 8.02494 9.62886 8.36821 9.35999 8.6401L8.08999 9.9101C9.51355 12.4136 11.5864 14.4865 14.09 15.9101L15.36 14.6401C15.6319 14.3712 15.9751 14.1859 16.3491 14.1062C16.7231 14.0264 17.1121 14.0556 17.47 14.1901C18.3773 14.5286 19.3199 14.7635 20.28 14.8901C20.7658 14.9586 21.2094 15.2033 21.5265 15.5776C21.8437 15.9519 22.0122 16.4297 22 16.9201Z" stroke="#F2AE59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  </svg>
                            </a>
    
                        </div>
                        <div class="col-md-11">
                            <a href="https://wa.me/{{ $numeroWsp }}?text=Hola,%20quiero%20enviar%20un%20mensaje" target="_blank" style="text-decoration: none; color:#000">
    
                            <p>{{$contacto[0]['telefono']}}</p>
                            </a>
                        </div>
    
                    </div>
    
                    <div class="row d-flex mt-3" style="color: #000;
                    font-family: Inter;
                    font-size: 15px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;">
                        <div class="col-md-1">
                            <a href="mailto:{{$contacto[0]['email']}}" style="text-decoration: none; color:#000">
    
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20 4H4C2.89543 4 2 4.89543 2 6V18C2 19.1046 2.89543 20 4 20H20C21.1046 20 22 19.1046 22 18V6C22 4.89543 21.1046 4 20 4Z" stroke="#F2AE59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 7L13.03 12.7C12.7213 12.8934 12.3643 12.996 12 12.996C11.6357 12.996 11.2787 12.8934 10.97 12.7L2 7" stroke="#F2AE59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                            </a>
                        </div>
                        <div class="col-md-11">
                            <a href="mailto:{{$contacto[0]['email']}}" style="text-decoration: none; color:#000">
                                <p>{{$contacto[0]['email']}}</p>
                            </a>
                        </div>
    
                    </div>
    
                </div>
    
            </div>

        </div>
    </div>

    <div class="container mt-5" style="border-top: 1px solid #E6E6E6">
        <div class="d-flex justify-content-between mt-3" style="color: #000;
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;">
            <p>© Copyright 2024 Real Química. Todos los derechos reservados</p>
            <a href="https://osole.com.ar/" target="_blank" style="text-decoration: none; color:#000" >
                <p>By osole</p>
            </a>

        </div>
        

    </div>
</div>

