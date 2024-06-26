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
                    <input type="text" class="form-control" id="titulo" v-model="bannerTitulo">
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Título (Portugués)</label>
                    <input type="text" class="form-control" id="tituloAlternativo" v-model="bannerTituloAlternativo">
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
                <button @click="updateBanner" type="button" class="btn" style="background-color: #7F7F7F; color: white;">Guardar</button>
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
        };
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
                return '/api/getImage/' + filePath;
            }
        },
        guardarFoto() {
            const file = this.$refs.fotoBanner;
            this.foto = file.files[0];
        },
        guardarPolitica() {
            const file = this.$refs.politicaCalidad;
            this.calidad = file.files[0];
        },
        guardarCertificado() {
            const file = this.$refs.CertificadoAnmat;
            this.certificado = file.files[0];
        },
        updateBanner() {
            let formData = new FormData();
            formData.append('idBanner', this.idBanner);
            formData.append('foto', this.foto);
            formData.append('bannerTitulo', this.bannerTitulo);
            formData.append('bannerTituloAlternativo', this.bannerTituloAlternativo);
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
        destroySummernote() {
            if ($('#editor').data('summernote')) {
                $('#editor').summernote('destroy');
            }
            if ($('#editorAlternativo').data('summernote')) {
                $('#editorAlternativo').summernote('destroy');
            }
        },
        initializeSummernote() {
            $('#editor').summernote({
                height: 300
            });
            $('#editorAlternativo').summernote({
                height: 300
            });

            const noteBar = $('.note-toolbar');
            noteBar.find('[data-toggle]').each(function () {
                $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
            });
        },
        summerNote() {
            this.destroySummernote();
            this.initializeSummernote();
        },
        obtenerBannerInformacion() {
            axios.get(`/api/obtenerBanner`)
                .then(response => {
                    const data = response.data;
                    const bannerData = data[this.idComponente === 7 ? 0 : 1];

                    this.bannerTexto = bannerData.texto;
                    this.bannerTextoAlternativo = bannerData.textoAlternativo;
                    this.bannerTitulo = bannerData.titulo;
                    this.bannerTituloAlternativo = bannerData.tituloAlternativo;
                    this.idBanner = bannerData.id;
                    this.imagen = bannerData.imagen;
                    this.seccion = bannerData.seccion;
                    this.txtBoton = bannerData.textoboton;
                    this.linkBoton = bannerData.link;

                    this.summerNote();
                    $('#editor').summernote('code', bannerData.texto);
                    $('#editorAlternativo').summernote('code', bannerData.textoAlternativo);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {
        this.summerNote();
        this.obtenerBannerInformacion();
    },

    beforeDestroy() {
        this.destroySummernote();
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
