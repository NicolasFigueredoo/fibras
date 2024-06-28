<template>
    <div>
        <div class="container contacto" style="margin-bottom: 80px">

            <template v-if="this.idioma == 'ES'">
                <div class="row">
                    <div class="col-lg-4 informacion">
    
                        <div class="ubicacion" style="cursor: pointer; ">
                            <div style="width: 20px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M16.6663 8.33341C16.6663 13.3334 9.99967 18.3334 9.99967 18.3334C9.99967 18.3334 3.33301 13.3334 3.33301 8.33341C3.33301 6.5653 4.03539 4.86961 5.28563 3.61937C6.53587 2.36913 8.23156 1.66675 9.99967 1.66675C11.7678 1.66675 13.4635 2.36913 14.7137 3.61937C15.964 4.86961 16.6663 6.5653 16.6663 8.33341Z"
                                        stroke="#0397D6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M10 10.8333C11.3807 10.8333 12.5 9.71396 12.5 8.33325C12.5 6.95254 11.3807 5.83325 10 5.83325C8.61929 5.83325 7.5 6.95254 7.5 8.33325C7.5 9.71396 8.61929 10.8333 10 10.8333Z"
                                        stroke="#0397D6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <a href="https://maps.app.goo.gl/EjZZtMituNzmSFUK7" target="_blank"
                                style="text-decoration: none; color: black;">
                                <p id="ubi" style="margin-left: 20px">
                                    {{ direccion }}
                                </p>
                            </a>
                        </div>
                        <div class="telefono" style="cursor: pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <g clip-path="url(#clip0_2204_9067)">
                                    <path
                                        d="M18.3332 14.0999V16.5999C18.3341 16.832 18.2866 17.0617 18.1936 17.2744C18.1006 17.487 17.9643 17.6779 17.7933 17.8348C17.6222 17.9917 17.4203 18.1112 17.2005 18.1855C16.9806 18.2599 16.7477 18.2875 16.5165 18.2666C13.9522 17.988 11.489 17.1117 9.32486 15.7083C7.31139 14.4288 5.60431 12.7217 4.32486 10.7083C2.91651 8.53426 2.04007 6.05908 1.76653 3.48325C1.7457 3.25281 1.77309 3.02055 1.84695 2.80127C1.9208 2.58199 2.03951 2.38049 2.1955 2.2096C2.3515 2.03871 2.54137 1.90218 2.75302 1.80869C2.96468 1.7152 3.19348 1.6668 3.42486 1.66658H5.92486C6.32928 1.6626 6.72136 1.80582 7.028 2.06953C7.33464 2.33324 7.53493 2.69946 7.59153 3.09992C7.69705 3.89997 7.89274 4.68552 8.17486 5.44158C8.28698 5.73985 8.31125 6.06401 8.24478 6.37565C8.17832 6.68729 8.02392 6.97334 7.79986 7.19992L6.74153 8.25825C7.92783 10.3445 9.65524 12.072 11.7415 13.2583L12.7999 12.1999C13.0264 11.9759 13.3125 11.8215 13.6241 11.755C13.9358 11.6885 14.2599 11.7128 14.5582 11.8249C15.3143 12.107 16.0998 12.3027 16.8999 12.4083C17.3047 12.4654 17.6744 12.6693 17.9386 12.9812C18.2029 13.2931 18.3433 13.6912 18.3332 14.0999Z"
                                        stroke="#0397D6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2204_9067">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <p style="margin-left: 20px">{{ telefono }}</p>
                        </div>
    
                        <div class="email mt-2" style="cursor: pointer">
    
                            <svg @click="abrirEmail()" xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                viewBox="0 0 24 20" fill="none">
                                <path
                                    d="M20 3.33337H4C2.89543 3.33337 2 4.07957 2 5.00004V15C2 15.9205 2.89543 16.6667 4 16.6667H20C21.1046 16.6667 22 15.9205 22 15V5.00004C22 4.07957 21.1046 3.33337 20 3.33337Z"
                                    stroke="#0397D6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M22 5.83337L13.03 10.5834C12.7213 10.7446 12.3643 10.83 12 10.83C11.6357 10.83 11.2787 10.7446 10.97 10.5834L2 5.83337"
                                    stroke="#0397D6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p style="margin-left: 20px" @click="abrirEmail()">{{ emailC }}</p>
                        </div>
                    </div>
    
                    <form id="formularioI" class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Nombre*</label>
                                <input type="text" class="mt-2 form-control" v-model="nombre" />
                            </div>
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Apellido*</label>
                                <input type="text" class="mt-2 form-control" v-model="empresa" />
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Email*</label>
                                <input type="text" class="mt-2 form-control" v-model="email" />
                            </div>
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Celular</label>
                                <input type="text" class="mt-2 form-control" v-model="celular" />
                            </div>
                         
                        </div>
    
                        <div class="row" style="margin-top: 20px">
                            <div class="col-lg-6">
                                <label for="nombre">Mensaje</label>
    
                                <textarea class="form-control mt-2" id="mensajeInput" style="
                                          width: 100%;
                                          height: 150px;
                                          border-radius: 0%;
                                      " v-model="mensaje"></textarea>
                            </div>
                            <div id="content" class="d-flex flex-column justify-content-start align-items-start col-lg-6 mt-4 gap-5">
    
                                <div style="margin-top: 20px;">
                                    <p class="campoO">*Datos obligatorios</p>
                                </div>
                                <div>
                                    <button id="enviarContacto" type="button" style="border-radius: 30px"
                                        class="btn btn-primary" @click="enviarCorreo()">
                                        ENVIAR CONSULTA
                                    </button>
                                </div>
                            </div>
                            <div id="mensajePresupuesto"></div>
    
                        </div>
                    </form>
                </div>
            </template>
            <template v-else>
                <div class="row">
                    <div class="col-lg-4 informacion">
    
                        <div class="ubicacion" style="cursor: pointer; ">
                            <div style="width: 20px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M16.6663 8.33341C16.6663 13.3334 9.99967 18.3334 9.99967 18.3334C9.99967 18.3334 3.33301 13.3334 3.33301 8.33341C3.33301 6.5653 4.03539 4.86961 5.28563 3.61937C6.53587 2.36913 8.23156 1.66675 9.99967 1.66675C11.7678 1.66675 13.4635 2.36913 14.7137 3.61937C15.964 4.86961 16.6663 6.5653 16.6663 8.33341Z"
                                        stroke="#0397D6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M10 10.8333C11.3807 10.8333 12.5 9.71396 12.5 8.33325C12.5 6.95254 11.3807 5.83325 10 5.83325C8.61929 5.83325 7.5 6.95254 7.5 8.33325C7.5 9.71396 8.61929 10.8333 10 10.8333Z"
                                        stroke="#0397D6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <a href="https://maps.app.goo.gl/EjZZtMituNzmSFUK7" target="_blank"
                                style="text-decoration: none; color: black;">
                                <p id="ubi" style="margin-left: 20px">
                                    {{ direccion }}
                                </p>
                            </a>
                        </div>
                        <div class="telefono" style="cursor: pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <g clip-path="url(#clip0_2204_9067)">
                                    <path
                                        d="M18.3332 14.0999V16.5999C18.3341 16.832 18.2866 17.0617 18.1936 17.2744C18.1006 17.487 17.9643 17.6779 17.7933 17.8348C17.6222 17.9917 17.4203 18.1112 17.2005 18.1855C16.9806 18.2599 16.7477 18.2875 16.5165 18.2666C13.9522 17.988 11.489 17.1117 9.32486 15.7083C7.31139 14.4288 5.60431 12.7217 4.32486 10.7083C2.91651 8.53426 2.04007 6.05908 1.76653 3.48325C1.7457 3.25281 1.77309 3.02055 1.84695 2.80127C1.9208 2.58199 2.03951 2.38049 2.1955 2.2096C2.3515 2.03871 2.54137 1.90218 2.75302 1.80869C2.96468 1.7152 3.19348 1.6668 3.42486 1.66658H5.92486C6.32928 1.6626 6.72136 1.80582 7.028 2.06953C7.33464 2.33324 7.53493 2.69946 7.59153 3.09992C7.69705 3.89997 7.89274 4.68552 8.17486 5.44158C8.28698 5.73985 8.31125 6.06401 8.24478 6.37565C8.17832 6.68729 8.02392 6.97334 7.79986 7.19992L6.74153 8.25825C7.92783 10.3445 9.65524 12.072 11.7415 13.2583L12.7999 12.1999C13.0264 11.9759 13.3125 11.8215 13.6241 11.755C13.9358 11.6885 14.2599 11.7128 14.5582 11.8249C15.3143 12.107 16.0998 12.3027 16.8999 12.4083C17.3047 12.4654 17.6744 12.6693 17.9386 12.9812C18.2029 13.2931 18.3433 13.6912 18.3332 14.0999Z"
                                        stroke="#0397D6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2204_9067">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <p style="margin-left: 20px">{{ telefono }}</p>
                        </div>
    
                        <div class="email mt-2" style="cursor: pointer">
    
                            <svg @click="abrirEmail()" xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                viewBox="0 0 24 20" fill="none">
                                <path
                                    d="M20 3.33337H4C2.89543 3.33337 2 4.07957 2 5.00004V15C2 15.9205 2.89543 16.6667 4 16.6667H20C21.1046 16.6667 22 15.9205 22 15V5.00004C22 4.07957 21.1046 3.33337 20 3.33337Z"
                                    stroke="#0397D6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M22 5.83337L13.03 10.5834C12.7213 10.7446 12.3643 10.83 12 10.83C11.6357 10.83 11.2787 10.7446 10.97 10.5834L2 5.83337"
                                    stroke="#0397D6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p style="margin-left: 20px" @click="abrirEmail()">{{ emailC }}</p>
                        </div>
                    </div>
    
                    <form id="formularioI" class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Nome*</label>
                                <input type="text" class="mt-2 form-control" v-model="nombre" />
                            </div>
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Sobrenome*</label>
                                <input type="text" class="mt-2 form-control" v-model="empresa" />
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-lg-6 inputs">
                                <label for="nombre">E-mail*</label>
                                <input type="text" class="mt-2 form-control" v-model="email" />
                            </div>
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Celular</label>
                                <input type="text" class="mt-2 form-control" v-model="celular" />
                            </div>
                         
                        </div>
    
                        <div class="row" style="margin-top: 20px">
                            <div class="col-lg-6">
                                <label for="nombre">Mensagem</label>
    
                                <textarea class="form-control mt-2" id="mensajeInput" style="
                                          width: 100%;
                                          height: 150px;
                                          border-radius: 0%;
                                      " v-model="mensaje"></textarea>
                            </div>
                            <div id="content" class="d-flex flex-column justify-content-start align-items-start col-lg-6 mt-4 gap-5">
    
                                <div style="margin-top: 20px;">
                                    <p class="campoO">*Dados requeridos</p>
                                </div>
                                <div>
                                    <button id="enviarContacto" type="button" style="border-radius: 30px"
                                        class="btn btn-primary" @click="enviarCorreo()">
                                        ENVIAR CONSULTA
                                    </button>
                                </div>
                            </div>
                            <div id="mensajePresupuesto"></div>
    
                        </div>
                    </form>
                </div>
            </template>


                <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1088.4803844929622!2d-58.31496047857967!3d-34.732196589982024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a32d9a0773059b%3A0x28d59f00b155088b!2sFibras%20Argentinas!5e0!3m2!1ses!2sar!4v1717699004654!5m2!1ses!2sar" 
                width="800" height="516" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            telefono_secundario: null,
            idioma: null
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
                    this.telefono = response.data.contacto[0].telefono;
                    this.emailC = response.data.contacto[0].email;
                    this.direccion = response.data.contacto[0].direccion;
                    this.telefono_secundario = response.data.contacto[0].telefono_secundario;
                    response.data.idioma.forEach(element => {
                        if(element.activo == 1){
                            this.idioma = element.idioma
                        }
                    });
                })
                .catch((error) => {
                    console.error("Error al traer los contactos:", error);
                });
        },
        enviarCorreo() {
            let self = this;
       
            $("#mensajePresupuesto").html(
                '<p class="text-success">Enviando..</p>'
            );

            axios
                .post("/enviarCorreo", {
                    nombre: self.nombre,
                    apellido: self.empresa,
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
                    let errorMessage = error.response.data.message || 'Error al enviar correo';
                    $('#mensajePresupuesto').html(`<p class="textE text-danger">${errorMessage}</p>`);
                    console.error(errorMessage);
                });

        },
    },
    mounted() {
        this.obtenerContacto();
    },
};
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


textarea::placeholder {
    color: rgba(0, 0, 0, 0.50);
    font-family: 'Poppins';
    font-size: 16px;
    font-style: normal;
    font-weight: 300;
    line-height: 50px;
}

input {
    height: 48px;
    flex-shrink: 0;
    border-radius: 6px !important;
    border: 1px solid #D9D9D9 !important;
}

label{
    color: #000;
    font-family: 'Poppins';
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
}

.mapa {
    width: 100%;
    margin-top: 80px;
}

.titleForm {
    color: #000;
    font-family: 'Poppins';
    font-size: 18px;
    font-style: normal;
    font-weight: 300;
    line-height: normal;
    margin-bottom: 30px;
}

.campoO {
    color: #131313;
    font-family: 'Poppins';
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
    font-family: 'Poppins';
    font-size: 35px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
}

.informacion {
    font-size: 18px;
    font-family: 'Poppins';
    font-weight: 400;
    line-height: 21.94px;
    margin-top: 18px;
}



.ubicacion {
    display: flex;
    width: 350px;

    color: #000;
    font-family: 'Poppins';
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.telefono {
    display: flex;
    color: #000;
    font-family: 'Poppins';
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.email {
    display: flex;
    font-size: 16px;
    color: #000;
    font-family: 'Poppins';
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
    font-family: 'Poppins';
    font-weight: 400;
}

#enviarContacto {
    width: 392px;
height: 49px;
flex-shrink: 0;
background: var(--azul, #00245D) !important;
color: #FFF;
text-align: center;
font-family: 'Poppins';
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
border: none !important;
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
    font-family: 'Poppins';
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

label{
    color: #000;
font-family: "Poppins";
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
}

@media screen and (max-width: 1000px) {
        .inputs{
            margin-top: 20px;
        }

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