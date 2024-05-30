<template>
    <div>
        <div class="container contacto" style="margin-bottom: 80px">
            <div class="row">
                <div class="col-lg-4 informacion">
                    <p class="textoC ">Para mayor información, no dude en contactarse mediante el siguiente formulario,
                        o
                        a través de nuestras vías de comunicación.</p>


                    <div class="ubicacion" style="cursor: pointer; margin-top: 30px;">
                        <div style="width: 20px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M20 10C20 16 12 22 12 22C12 22 4 16 4 10C4 7.87827 4.84285 5.84344 6.34315 4.34315C7.84344 2.84285 9.87827 2 12 2C14.1217 2 16.1566 2.84285 17.6569 4.34315C19.1571 5.84344 20 7.87827 20 10Z"
                                    stroke="#F2AE59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                    stroke="#F2AE59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <a href="https://maps.app.goo.gl/z5x58zQqzVjJCyiQ6" target="_blank"
                            style="text-decoration: none; color: black;">
                            <p id="ubi" style="margin-left: 20px">
                                {{ direccion }}
                            </p>
                        </a>
                    </div>
                    <div class="telefono" style="cursor: pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M22.0004 16.92V19.92C22.0016 20.1985 21.9445 20.4741 21.8329 20.7293C21.7214 20.9845 21.5577 21.2136 21.3525 21.4018C21.1473 21.5901 20.905 21.7335 20.6412 21.8227C20.3773 21.9119 20.0978 21.945 19.8204 21.92C16.7433 21.5856 13.7874 20.5341 11.1904 18.85C8.77425 17.3146 6.72576 15.2661 5.19042 12.85C3.5004 10.2412 2.44866 7.27097 2.12042 4.17997C2.09543 3.90344 2.1283 3.62474 2.21692 3.3616C2.30555 3.09846 2.44799 2.85666 2.63519 2.6516C2.82238 2.44653 3.05023 2.28268 3.30421 2.1705C3.5582 2.05831 3.83276 2.00024 4.11042 1.99997H7.11042C7.59573 1.9952 8.06621 2.16705 8.43418 2.48351C8.80215 2.79996 9.0425 3.23942 9.11042 3.71997C9.23704 4.68004 9.47187 5.6227 9.81042 6.52997C9.94497 6.8879 9.97408 7.27689 9.89433 7.65086C9.81457 8.02482 9.62928 8.36809 9.36042 8.63998L8.09042 9.90997C9.51398 12.4135 11.5869 14.4864 14.0904 15.91L15.3604 14.64C15.6323 14.3711 15.9756 14.1858 16.3495 14.1061C16.7235 14.0263 17.1125 14.0554 17.4704 14.19C18.3777 14.5285 19.3204 14.7634 20.2804 14.89C20.7662 14.9585 21.2098 15.2032 21.527 15.5775C21.8441 15.9518 22.0126 16.4296 22.0004 16.92Z"
                                stroke="#F2AE59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p style="margin-left: 20px">{{ telefono }}</p>
                    </div>

                    <div class="email mt-2" style="cursor: pointer">
                        <svg @click="abrirEmail()" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path
                                d="M20 4H4C2.89543 4 2 4.89543 2 6V18C2 19.1046 2.89543 20 4 20H20C21.1046 20 22 19.1046 22 18V6C22 4.89543 21.1046 4 20 4Z"
                                stroke="#F2AE59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M22 7L13.03 12.7C12.7213 12.8934 12.3643 12.996 12 12.996C11.6357 12.996 11.2787 12.8934 10.97 12.7L2 7"
                                stroke="#F2AE59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p style="margin-left: 20px" @click="abrirEmail()">{{ emailC }}</p>
                    </div>
                </div>

                <form id="formularioI" class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nombre">Nombre y apellido*</label>
                            <input type="text" class="mt-2 form-control" v-model="nombre" />
                        </div>
                        <div class="col-lg-6">
                            <label for="nombre">E-mail*</label>
                            <input type="text" class="mt-2 form-control" v-model="email" />
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-6">
                            <label for="nombre">Telefono*</label>
                            <input type="text" class="mt-2 form-control" v-model="celular" />
                        </div>
                        <div class="col-lg-6">
                            <label for="nombre">Empresa*</label>
                            <input type="text" class="mt-2 form-control" v-model="empresa" />
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-12">
                            <label for="nombre">Mensaje*</label>

                            <textarea class="form-control mt-2" id="mensajeInput" style="
                                      width: 100%;
                                      height: 150px;
                                      border-radius: 0%;
                                  " v-model="mensaje"></textarea>
                        </div>
                        <div id="mensajePresupuesto"></div>
                        <div id="content" class="d-flex justify-content-end align-items-center col-lg-12 mt-3 gap-5">

                            <div style="margin-top: 20px;">
                                <p class="campoO">*Campos obligatorios</p>
                            </div>
                            <div>
                                <button id="enviarContacto" type="button" style="border-radius: 0%"
                                    class="btn btn-primary" @click="enviarCorreo()">
                                    Enviar formulario
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <iframe class="mapa"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3291.5926291472765!2d-58.95970538843187!3d-34.41169887291124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bb7d6a8f2c1c45%3A0x6c65f2d8ec589e53!2sReal%20Quimica%20SRL!5e0!3m2!1ses!2sar!4v1716913688940!5m2!1ses!2sar"
                width="800" height="516" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import $ from 'jquery';

export default {
    data() {
        return {
            nombre: "",
            email: "",
            celular: "",
            mensaje: "",
            empresa: "",
            telefono: null,
            emailC: null,
            whatsappLink: null,
            direccion: null,
            telefono_secundario: null
        };
    },
    methods: {
        abrirEmail() {
            const destinatario = this.emailC;
            const asunto = "Contacto desde la web quimica Real";
            const cuerpo = "Hola queria consultar";

            const mailtoLink = `mailto:${destinatario}?subject=${encodeURIComponent(
                asunto
            )}&body=${encodeURIComponent(cuerpo)}`;
            window.location.href = mailtoLink;
        },
        obtenerContacto() {
            axios
                .get(`/api/obtenerContacto`)
                .then((response) => {
                    this.telefono = response.data[0].telefono;
                    this.emailC = response.data[0].email;
                    this.direccion = response.data[0].direccion;
                    this.telefono_secundario = response.data[0].telefono_secundario;

                })
                .catch((error) => {
                    console.error("Error al traer los contactos:", error);
                });
        },
        enviarCorreo() {
            let self = this;
            if (!this.nombre || !this.empresa || !this.email) {
                $("#mensajePresupuesto").html(
                    '<p class="text-danger">Mensaje fallido faltan rellenar campos obligatorios</p>'
                );
                return;
            }


            $("#mensajePresupuesto").html(
                '<p class="text-success">Enviando..</p>'
            );

            axios
                .post("/enviarCorreo", {
                    nombre: self.nombre,
                    empresa: self.empresa,
                    email: self.email,
                    celular: self.celular,
                    mensaje: self.mensaje
                })
                .then((response) => {
                    $("#mensajePresupuesto").html(
                        '<p class="text-success">Mensaje enviado correctamente</p>'
                    );
                })
                .catch((error) => {
                    $("#mensajePresupuesto").html(
                        '<p class="text-danger">Mensaje fallido revisar campos</p>'
                    );
                });

        },
    },
    mounted() {
        this.obtenerContacto();
    },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");


textarea::placeholder {
    color: rgba(0, 0, 0, 0.50);
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 300;
    line-height: 50px;
}

input {
    height: 48px;
    flex-shrink: 0;
    border-radius: 4px !important;
    border: 1px solid #D9D9D9 !important;
}

.mapa {
    width: 100%;
    margin-top: 80px;
}

.titleForm {
    color: #000;
    font-family: 'Inter';
    font-size: 18px;
    font-style: normal;
    font-weight: 300;
    line-height: normal;
    margin-bottom: 30px;
}

.campoO {
    color: #131313;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.contacto {
    background-color: white;
    margin-top: 50px;
}

.titulo {
    color: #000;
    font-family: 'Inter';
    font-size: 35px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
}

.informacion {
    font-size: 18px;
    font-family: "Montserrat", sans-serif;
    font-weight: 400;
    line-height: 21.94px;
    margin-top: 18px;
}



.ubicacion {
    display: flex;
    width: 350px;

    color: #000;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.telefono {
    display: flex;
    color: #000;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.email {
    display: flex;
    font-size: 16px;
    color: #000;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.iconContacto {
    align-items: center;
    font-size: 20px;
    color: #33447f;
}

.iconContacto:hover {
    transform: scale(1.2);
    transition: 0.5s;
}

.casilla span {
    font-size: 16px;
    font-family: "Montserrat";
    font-weight: 400;
}

#enviarContacto {
    display: inline-flex;
    height: 40px;
    padding: 10px 32px;
    justify-content: center;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
    border: none;
    border-radius: 40px !important;
    background: var(--Naranja, #F2AE59);
    color: #FFF;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.enviar {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}

.form-control {
    border-radius: 0%;
}

.textoC {
    color: #131313;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 160%;
    /* 25.6px */
}

#ubi:hover {
    font-weight: 500;
}

.telefono p:hover {
    font-weight: 500;
}

.email p:hover {
    font-weight: 500;
}

@media only screen and (max-width: 600px) {
    #content {
        flex-direction: column;
    }

    #enviarContacto {
        width: 100%;
    }

    .ubicacion {
        width: 100%;
    }

    #ubi {
        width: 100%;

    }
}

@media only screen and (max-width: 200px) {
    .email {
        font-size: 10px;
    }

    #ubi {
        width: 100px;
    }
}
</style>