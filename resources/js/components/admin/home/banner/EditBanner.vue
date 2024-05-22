<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR BANNER</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-6">
                    <label class="form-label">Imagen (Tamaño recomendado 804x650) </label>
                    <input type="file" ref="fotoBanner" class="form-control" @change="guardarFoto()">
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" :value="this.bannerTitulo">
                </div>
          
            </div>
            <div class="row mt-3 col-md-3">
                <img class="imagen" :src="getImagen(this.imagen)" alt="">
            </div>

            <div class="mt-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor" :value="bannerTexto"></textarea>
            </div>

            <!-- <div v-if="this.seccion === 'home'" class="row mt-2">
                <div class="col-lg-6">
                <label class="form-label">Texto boton</label>
                <input type="text" class="form-control" id="txtBoton" :value="this.txtBoton" >
                </div>
                <div class="col-lg-6">
                <label class="form-label">Link boton</label>
                <input type="text" class="form-control" id="linkBoton" :value="this.linkBoton" >
                </div>

            </div> -->

            <div class="w-100 d-flex justify-content-end mt-3">
                <button @click="updateBanner()" type="button" class="btn"
                    style="background-color: #7F7F7F; color: white;">Guardar</button>
            </div>

        </form>



    </div>

</template>

<script>
import 'jquery';
import 'bootstrap';
import 'summernote';
import 'summernote/dist/summernote-bs4.css';
import axios from 'axios';
export default {

    data() {
        return {
            foto: null,
            bannerTitulo: '',
            bannerTexto: '',
            idBanner: null,
            imagen: null,
            seccion: null,
            txtBoton: null,
            linkBoton: null
        }

    },

    computed: {
        idComponente() {
            return this.$store.getters['getMostrarComponente'];
        }
    },
    methods: {
        getImagen(fileName) {
            if (fileName) {
                const filePath = fileName.split('/').pop();
                return '/api/getImage/' + filePath
            }
        },
        guardarFoto() {
            const file = this.$refs.fotoBanner;
            this.foto = file.files[0]
        },
        updateBanner() {
            let formData = new FormData();
            formData.append('idBanner', this.idBanner);
            formData.append('foto', this.foto);
            formData.append('bannerTitulo', $('#titulo').val());
            formData.append('bannerTexto', $('#editor').summernote('code').toString());
            formData.append('txtBoton', $('#txtBoton').val());
            formData.append('linkBoton', $('#linkBoton').val());


            axios.post('/api/updateBanner', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Banner actualizado con éxito');
                    this.obtenerBannerInformacion();
                })
                .catch(error => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', 'Error al actualizar el banner');
                });


        },
        summerNote() {
            if (this.getSummer === null && this.getSummer !== true && this.getSummer === undefined) {
                $('#editor').summernote({
                    height: 300,
                });
                var noteBar = $('.note-toolbar');
                noteBar.find('[data-toggle]').each(function () {
                    $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
                });

                this.$store.commit('setSummer', true);
            }
        },
        obtenerBannerInformacion() {
            axios.get(`/api/obtenerBanner`)
                .then(response => {
                    if (this.idComponente === 7) {
                        this.bannerTexto = response.data[0].texto
                        this.bannerTitulo = response.data[0].titulo
                        this.idBanner = response.data[0].id
                        this.imagen = response.data[0].imagen
                        this.seccion = response.data[0].seccion
                        this.txtBoton = response.data[0].textoboton
                        this.linkBoton = response.data[0].link
                    } else if(this.idComponente === 120) {
                        this.bannerTexto = response.data[1].texto
                        this.bannerTitulo = response.data[1].titulo
                        this.idBanner = response.data[1].id
                        this.imagen = response.data[1].imagen
                        this.seccion = response.data[1].seccion
                        this.txtBoton = response.data[1].textoboton
                        this.linkBoton = response.data[1].link
                    }

                    else if(this.idComponente === 121) {
                        this.bannerTexto = response.data[2].texto
                        this.bannerTitulo = response.data[2].titulo
                        this.idBanner = response.data[2].id
                        this.imagen = response.data[2].imagen
                        this.seccion = response.data[2].seccion
                        this.txtBoton = response.data[2].textoboton
                        this.linkBoton = response.data[2].link
                    }

                    else if(this.idComponente === 122) {
                        this.bannerTexto = response.data[3].texto
                        this.bannerTitulo = response.data[3].titulo
                        this.idBanner = response.data[3].id
                        this.imagen = response.data[3].imagen
                        this.seccion = response.data[3].seccion
                        this.txtBoton = response.data[3].textoboton
                        this.linkBoton = response.data[3].link
                    }

                    $('#editor').summernote('code', this.bannerTexto);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.summerNote();
        this.obtenerBannerInformacion();


    }

}
</script>

<style scoped>
.encabezado {
    background-color: rgb(52, 68, 127);
    color: white;
}

* {
    font-size: 16px;
    color: black;
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
}

h1 {
    font-size: 28px;
    color: black;
    font-family: "Montserrat", sans-serif;
    font-weight: 700;
}

.imagen {
    width: 100%;
    height: 100%;
}
</style>
