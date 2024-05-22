<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR VIDEO</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-6">
                    <label class="form-label">Orden</label>
                <input type="text" class="form-control" id="orden" :value="this.video.orden">
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" :value="this.video.titulo">
                </div>
            </div>
            <div class="row mt-3">
                <div class="d-flex col-lg-6" style="gap: 20px;">
                    <div>
                        <label class="form-check-label" for="checkboxLink">Link</label>
                        <input style="margin-left: 10px;" type="checkbox" class="form-check-input" id="checkboxLink" 
                            @change="toggleCheckbox('link')">
                    </div>
                    <div>
                        <label class="form-check-label" for="checkboxArchivo">Archivo</label>
                        <input style="margin-left: 10px;" type="checkbox" class="form-check-input" id="checkboxArchivo"
                            @change="toggleCheckbox('archivo')">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div v-if="mostrarLinkInput" class="col-lg-6">
                    <label class="form-label">Link</label>
                    <input type="text" class="form-control" id="linkVideo" :value="this.video.link">
                </div>
                <div v-if="mostrarArchivoInput" class="col-lg-6">
                    <label class="form-label">Archivo</label><span v-if="this.video.file">(1)</span>
                    <input type="file" class="form-control" ref="fotoSlider" id="imgs" @change="guardarFoto">
                </div>
            </div>
  


            <div class="w-100 d-flex justify-content-end mt-3">
                <button @click="updateVideo()" type="button" class="btn"
                    style="background-color: #7F7F7F; color: white;">Actualizar</button>
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
            orden: null,
            video: '',
            mostrarLinkInput:false,
            mostrarArchivoInput: false
        }

    },
    computed: {
        idVideo() {
            return this.$store.getters['getIdVideo'];
        },
        idComponente() {
            return this.$store.getters['getMostrarComponente'];
        },
    },
    methods: {
        toggleCheckbox(type) {
            if (type === 'link') {
                $('#checkboxLink').prop('checked', true);
                $('#checkboxArchivo').prop('checked', false);
                this.mostrarArchivoInput = false;
                this.mostrarLinkInput = true;
            } else if (type === 'archivo') {
                $('#checkboxLink').prop('checked', false);
                $('#checkboxArchivo').prop('checked', true);
                this.mostrarLinkInput = false;

                this.mostrarArchivoInput = true;

            }
        },
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        updateVideo() {
            let formData = new FormData();

            let checkboxLink = $('#checkboxLink').prop("checked");
            let checkboxArchivo = $('#checkboxArchivo').prop("checked");

            if (checkboxLink) {
                formData.append('link', $('#linkVideo').val());
            }

            if (checkboxArchivo) {
                formData.append('file', this.foto);
            }

            formData.append('idVideo', this.idVideo);
            formData.append('orden', $('#orden').val());
            formData.append('titulo', $('#titulo').val());

            axios.post('/api/updateVideo', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {

                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Video modificado con éxito');
                    this.$store.commit('mostrarComponente', 80);
                  
                })
                .catch(error => {
                    console.error(error);
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', error);
                });


        },
        obtenerVideos() {
            axios.get(`/api/obtenerVideo/${this.idVideo}`)
                .then(response => {
                    this.video = response.data;
                    if(response.data.link !== null){
                        this.mostrarLinkInput = true;
                        $('#checkboxLink').prop('checked', true);

                    }else{
                        this.mostrarArchivoInput = true;
                        $('#checkboxArchivo').prop('checked', true);
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.obtenerVideos();


    }

}
</script>

<style scoped>
.form-check-input:checked {
    background-color: #7F7F7F;
    border-color: #7F7F7F;
}
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
</style>
