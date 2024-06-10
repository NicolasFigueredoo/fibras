<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR BANNER</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-9">
                    <label class="form-label">Imagen (Tamaño recomendado 750x600) </label>
                    <input type="file" ref="fotoBanner" class="form-control" @change="guardarFoto()">
                </div>
                <div class="row col-lg-3">
                    <img class="imagen" :src="getImagen(this.imagen)" alt="">


                </div>

            </div>


            <div class="row mt-3">
                <div class="col-lg-6">
                    <label class="form-label">Título (Español)</label>
                    <input type="text" class="form-control" id="titulo" :value="this.bannerTitulo">

                </div>
                <div class="col-lg-6">
                    <label class="form-label">Título (Portugués)</label>
                    <input type="text" class="form-control" id="tituloAlternativo"
                        :value="this.bannerTituloAlternativo">

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Texto (Español)</label>
                    <textarea class="summernote" id="editor"></textarea>
                </div>
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Texto (Portugués)</label>
                    <textarea class="summernote" id="editorAlternativo"></textarea>
                </div>
            </div>



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
            linkBoton: null,
            calidad: null,
            certificado: null,
            bannerTextoAlternativo: ''
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
        guardarPolitica() {
            const file = this.$refs.politicaCalidad;
            this.calidad = file.files[0]
        },
        guardarCertificado() {
            const file = this.$refs.CertificadoAnmat;
            this.certificado = file.files[0]
        },
        updateBanner() {
            let formData = new FormData();
            formData.append('idBanner', this.idBanner);
            formData.append('foto', this.foto);
            formData.append('bannerTitulo', $('#titulo').val());
            formData.append('bannerTituloAlternativo', $('#tituloAlternativo').val());
            formData.append('bannerTexto', $('#editor').summernote('code').toString());
            formData.append('bannerTextoAlternativo', $('#editorAlternativo').summernote('code').toString());
            formData.append('txtBoton', this.calidad);
            formData.append('linkBoton', this.certificado);
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


            $('#editor').summernote({
                height: 300,
            });
         


            $('#editorAlternativo').summernote({
                height: 300,
            });
     


        },
        obtenerBannerInformacion() {
            axios.get(`/api/obtenerBanner`)
                .then(response => {

                    if (this.idComponente == 7) {
                        console.log(response.data[0])
                        this.bannerTexto = response.data[0].texto
                        this.bannerTextoAlternativo = response.data[0].textoAlternativo
                        this.bannerTitulo = response.data[0].titulo
                        this.bannerTituloAlternativo = response.data[0].tituloAlternativo
                        this.idBanner = response.data[0].id
                        this.imagen = response.data[0].imagen
                        this.seccion = response.data[0].seccion
                        this.txtBoton = response.data[0].textoboton
                        this.linkBoton = response.data[0].link

                    } else if (this.idComponente == 122) {
                        this.bannerTexto = response.data[1].texto
                        this.bannerTextoAlternativo = response.data[1].textoAlternativo
                        this.bannerTitulo = response.data[1].titulo
                        this.idBanner = response.data[1].id
                        this.imagen = response.data[1].imagen
                        this.seccion = response.data[1].seccion
                        this.txtBoton = response.data[1].textoboton
                        this.linkBoton = response.data[1].link
                        this.bannerTituloAlternativo = response.data[1].tituloAlternativo

                    }

                    $('#editor').summernote('code', this.bannerTexto);
                    $('#editorAlternativo').summernote('code', this.bannerTextoAlternativo);




                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    beforeDestroy() {

        $('#editor').summernote('destroy');
        $('#editorAlternativo').summernote('destroy');
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
