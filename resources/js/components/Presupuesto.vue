<template>
    <div>
        <div class="container contacto" style="margin-bottom: 200px;">
            <div class="row m-5">
                <form id="formularioI" class="col-lg-12">
                    <template v-if="this.idioma == 'ES'">

                        <div class="row">
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Nombre y apellido*</label>
                                <input type="text" class="mt-2 form-control" v-model="nombre" />
                            </div>
                            <div class="col-lg-6 inputs">
                                <label for="nombre">E-mail*</label>
                                <input type="text" class="mt-2 form-control" v-model="email" />
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Telefono*</label>
                                <input type="text" class="mt-2 form-control" v-model="celular" />
                            </div>
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Empresa</label>
                                <input type="text" class="mt-2 form-control" v-model="empresa" />
                            </div>
                        </div>

                        <div class="row mt-5 mb-5">
                            <div class="col-lg-12">
                                <div style="border-top: 1px solid #DEDEDE;">

                                </div>
                            </div>

                        </div>

                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-6 inputs">
                                <label for="producto">Producto</label>
                                <div class="position-relative">
                                    <select id="selectProducto" class="mt-2 form-control custom-select"
                                        style="height: 48px; cursor: pointer;">
                                        <option value="">
                                            <p class="text-white">Seleccionar producto</p>
                                        </option>
                                        <option v-for="producto in productos" :key="producto.id"
                                            :value="producto.nombre">
                                            {{ producto.nombre }}
                                        </option>
                                    </select>
                                    <svg class="custom-arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M2.9 7.15002C3.15 6.90002 3.446 6.77502 3.788 6.77502C4.13 6.77502 4.42567 6.90002 4.675 7.15002L12 14.475L19.35 7.12502C19.5833 6.89169 19.875 6.77502 20.225 6.77502C20.575 6.77502 20.875 6.90002 21.125 7.15002C21.375 7.40002 21.5 7.69602 21.5 8.03802C21.5 8.38002 21.375 8.67569 21.125 8.92502L12.7 17.325C12.6 17.425 12.4917 17.496 12.375 17.538C12.2583 17.58 12.1333 17.6007 12 17.6C11.8667 17.6 11.7417 17.579 11.625 17.537C11.5083 17.495 11.4 17.4244 11.3 17.325L2.875 8.90002C2.64167 8.66669 2.525 8.37902 2.525 8.03702C2.525 7.69502 2.65 7.39936 2.9 7.15002Z"
                                            fill="#C4C4C4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-lg-6 inputs" id="archivos">
                                <label for="archivo">Archivo</label>
                                <div class="position-relative">
                                    <input style="cursor: pointer;" type="text" class="mt-2 form-control"
                                        v-model="archivoNombre" placeholder="Seleccionar archivo" readonly
                                        @click="abrirSelector" />
                                    <input type="file" ref="fileInput" id="fileInput" class="d-none"
                                        @change="seleccionarArchivo" />

                                    <svg @click="abrirSelector" class="custom-arrow" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M14.5 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V7.5L14.5 2Z"
                                            stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M14 2V8H20" stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M12 12V18" stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15 15L12 12L9 15" stroke="#0397D6" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div v-if="archiveAdd" class="position-relative">
                                    <input style="cursor: pointer;" type="text" class="mt-2 form-control"
                                        v-model="archivoNombreTwo" placeholder="Seleccionar archivo" readonly
                                        @click="abrirSelectorTwo" />
                                    <input type="file" ref="fileInputTwo" id="fileInputTwo" class="d-none"
                                        @change="seleccionarArchivo" />

                                    <svg @click="abrirSelectorTwo" class="custom-arrow"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M14.5 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V7.5L14.5 2Z"
                                            stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M14 2V8H20" stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M12 12V18" stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15 15L12 12L9 15" stroke="#0397D6" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div v-if="!archiveAdd" class="row mt-2" style="text-align: end;">
                            <div class="col-lg-12">
                                <p @click="agregarArchivo" class="addArchive" style="cursor: pointer;">+ Agregar otro
                                    archivo</p>

                            </div>

                        </div>

                        <div class="row d-flex justify-content-between" style="margin-top: 20px">

                            <div class="col-lg-6">
                                <label for="nombre">Observaciones</label>

                                <textarea class="form-control mt-2" id="mensajeInput" style="
                                          width: 100%;
                                          height: 150px;
                                          border-radius: 4px;
                                      " v-model="mensaje"></textarea>
                            </div>
                            <div id="content" class="d-flex justify-content-end align-items-end col-lg-4 inputs">
                                <button id="enviarContacto" type="button" class="btn btn-primary w-100"
                                    @click="enviarPresupuesto()">
                                    Enviar Solicitud
                                </button>
                            </div>
                            <div id="mensajePresupuesto"></div>

                        </div>
                    </template>
                    <template v-else>
                        <div class="row">
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Nome e sobrenome*</label>
                                <input type="text" class="mt-2 form-control" v-model="nombre" />
                            </div>
                            <div class="col-lg-6 inputs">
                                <label for="nombre">E-mail*</label>
                                <input type="text" class="mt-2 form-control" v-model="email" />
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Telefone*</label>
                                <input type="text" class="mt-2 form-control" v-model="celular" />
                            </div>
                            <div class="col-lg-6 inputs">
                                <label for="nombre">Empresa</label>
                                <input type="text" class="mt-2 form-control" v-model="empresa" />
                            </div>
                        </div>

                        <div class="row mt-5 mb-5">
                            <div class="col-lg-12">
                                <div style="border-top: 1px solid #DEDEDE;">

                                </div>
                            </div>

                        </div>

                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-6 inputs">
                                <label for="producto">Produtos</label>
                                <div class="position-relative">
                                    <select class="mt-2 form-control custom-select"
                                        style="height: 48px; cursor: pointer;">
                                        <option value="">
                                            <p class="text-white">Selecione o produto</p>
                                        </option>
                                        <option v-for="producto in productos" :key="producto.id"
                                            :value="producto.nombre">
                                            {{ producto.nombreAlternativo }}
                                        </option>
                                    </select>
                                    <svg class="custom-arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M2.9 7.15002C3.15 6.90002 3.446 6.77502 3.788 6.77502C4.13 6.77502 4.42567 6.90002 4.675 7.15002L12 14.475L19.35 7.12502C19.5833 6.89169 19.875 6.77502 20.225 6.77502C20.575 6.77502 20.875 6.90002 21.125 7.15002C21.375 7.40002 21.5 7.69602 21.5 8.03802C21.5 8.38002 21.375 8.67569 21.125 8.92502L12.7 17.325C12.6 17.425 12.4917 17.496 12.375 17.538C12.2583 17.58 12.1333 17.6007 12 17.6C11.8667 17.6 11.7417 17.579 11.625 17.537C11.5083 17.495 11.4 17.4244 11.3 17.325L2.875 8.90002C2.64167 8.66669 2.525 8.37902 2.525 8.03702C2.525 7.69502 2.65 7.39936 2.9 7.15002Z"
                                            fill="#C4C4C4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="archivo inputs">Arquivo</label>
                                <div class="position-relative">
                                    <input style="cursor: pointer;" type="text" class="mt-2 form-control"
                                        v-model="archivoNombre" placeholder="Selecione o arquivo" readonly
                                        @click="abrirSelector" />
                                    <input type="file" ref="fileInput" id="fileInput" class="d-none"
                                        @change="seleccionarArchivo" />

                                    <svg @click="abrirSelector" class="custom-arrow" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M14.5 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V7.5L14.5 2Z"
                                            stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M14 2V8H20" stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M12 12V18" stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15 15L12 12L9 15" stroke="#0397D6" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <div v-if="archiveAdd" class="position-relative">
                                    <input style="cursor: pointer;" type="text" class="mt-2 form-control"
                                        v-model="archivoNombreTwo" placeholder="Selecione o arquivo" readonly
                                        @click="abrirSelectorTwo" />
                                    <input type="file" ref="fileInputTwo" id="fileInputTwo" class="d-none"
                                        @change="seleccionarArchivo" />

                                    <svg @click="abrirSelectorTwo" class="custom-arrow"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M14.5 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V7.5L14.5 2Z"
                                            stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M14 2V8H20" stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M12 12V18" stroke="#0397D6" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15 15L12 12L9 15" stroke="#0397D6" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                            </div>
                        </div>

                        <div v-if="!archiveAdd" class="row mt-2" style="text-align: end;">
                            <div class="col-lg-12">
                                <p @click="agregarArchivo" class="addArchive" style="cursor: pointer;">+ Adicione outro
                                    arquivo</p>
                            </div>

                        </div>

                        <div class="row d-flex justify-content-between" style="margin-top: 20px">

                            <div class="col-lg-6">
                                <label for="nombre">Observações</label>

                                <textarea class="form-control mt-2" id="mensajeInput" style="
                                          width: 100%;
                                          height: 150px;
                                          border-radius: 4px;
                                      " v-model="mensaje"></textarea>
                            </div>
                            <div id="content" class="d-flex justify-content-end align-items-end col-lg-4 inputs">
                                <button id="enviarContacto" type="button" class="btn btn-primary w-100"
                                    @click="enviarPresupuesto()">
                                    Enviar solicitação
                                </button>
                            </div>
                            <div id="mensajePresupuesto"></div>

                        </div>

                    </template>
                </form>
            </div>
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
            productos: [],
            archivoNombre: null,
            idioma: null,
            archiveAdd: false,
            archivoNombreTwo: null,
            archivoPrincipal: null,
            archivoTwo: null
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

        agregarArchivo() {

            this.archiveAdd = true;

        },

        obtenerContacto() {
            axios
                .get(`/api/obtenerContacto`)
                .then((response) => {
                    response.data.idioma.forEach(element => {
                        if (element.activo == 1) {
                            this.idioma = element.idioma
                        }

                    });

                })
                .catch((error) => {
                    console.error("Error al traer los contactos:", error);
                });
        },

        obtenerProductos() {
            axios.get('/api/obtenerProductos')
                .then(response => {
                    this.productos = response.data
                })
                .catch(error => {
                    console.error(error);
                });
        },
        abrirSelector() {
            this.$refs.fileInput.click();
        },
        abrirSelectorTwo() {
            this.$refs.fileInputTwo.click();
        },
        seleccionarArchivo(event) {
            const archivo = event.target.files[0];
            if (archivo) {
                if (event.target.id == 'fileInput') {
                    const file = this.$refs.fileInput;
                    this.archivoPrincipal = file.files[0]
                    this.archivoNombre = archivo.name;
                } else {
                    const file = this.$refs.fileInputTwo;
                    this.archivoTwo = file.files[0]
                    this.archivoNombreTwo = archivo.name;

                }
            }
        },
        enviarPresupuesto() {
            $('#mensajePresupuesto').html('<p class="textE text-success">Enviando...</p>');

            const formData = new FormData();
            formData.append('nombre', this.nombre);
            formData.append('email', this.email);
            formData.append('telefono', this.celular);
            if (this.empresa) {
                formData.append('empresa', this.empresa);
            }else{
                formData.append('empresa', null);

            }
            if ($('#selectProducto').val()) {
                formData.append('producto', $('#selectProducto').val());
            }else{
                formData.append('producto', null);

            }

            if (this.archivoPrincipal) {
                formData.append('archivo', this.archivoPrincipal);
            }
            if (this.archivoTwo) {
                formData.append('archivoTwo', this.archivoTwo);
            }

            if (this.mensaje) {
                formData.append('mensaje', this.mensaje);
            }else{
                formData.append('mensaje', null);

            }

            axios.post('/api/enviarPresupuesto', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    $('#mensajePresupuesto').html('<p class="textE text-success">Presupuesto enviado correctamente</p>');
                })
                .catch(error => {
                    let errorMessage = error.response.data.message || 'Error al enviar el presupuesto';
                    $('#mensajePresupuesto').html(`<p class="textE text-danger">${errorMessage}</p>`);
                    console.error(errorMessage);
                });
        }

    },
    mounted() {
        this.obtenerContacto();
        this.obtenerProductos();

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
    height: 49px;
    flex-shrink: 0;
    color: #FFF;
    text-align: center;
    font-family: 'Poppins';
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    background: var(--azul, #00245D) !important;
    border-radius: 30px !important;
    text-transform: uppercase;
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

.custom-select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    padding-right: 40px;
    /* espacio para el svg */
    background: none;
    border-radius: 4px !important;
    background-color: #fff;
    /* asegura que el fondo sea blanco */
    border: 1px solid #ccc;
    /* agrega un borde para mejor visibilidad */
    position: relative;
    /* asegura que el select sea relativo */
}

.position-relative {
    position: relative;
}

.custom-arrow {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
}



.d-none {
    display: none;
}

.addArchive {
    color: var(--negro, #000);
    text-align: right;
    font-family: 'Poppins';
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

label {
    color: var(--negro, #000);
    font-family: "Poppins";
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

@media screen and (max-width: 1000px) {
    .inputs {
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