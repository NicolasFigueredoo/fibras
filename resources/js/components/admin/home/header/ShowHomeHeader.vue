<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>HOME HEADER</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label">Imagen o video (Tamaño recomendado 1366x768)</label>
                    <input type="file" class="form-control" ref="img1" @change="guardarFile()">
                </div>
            </div>
            <div class="row mt-3">

                <div class="col-md-12">
                    <label for="exampleInputPassword1" class="form-label">Texto</label>
                    <textarea class="summernote" id="editor"></textarea>
                </div>

            </div>


            <div class="w-100 d-flex justify-content-end">

                <button @click="updateSlider()" type="button" class="btn mt-3"
                    style="background-color: rgb(127,127,127); color: white;">Actualizar</button>

            </div>

        </form>

    </div>

</template>

<script>
import axios from 'axios';
import 'jquery';

import 'summernote';
import 'summernote/dist/summernote-bs4.css';

export default {

    data() {
        return {
            file: null,
        }
    },

    methods: {
        guardarFile() {
            const file = this.$refs.img1;
            this.file = file.files[0]
        },
        obtenerSliderInformacion() {
            axios.get(`/api/obtenerSlider/1`)
                .then(response => {
                    this.slider = response.data;
                    $('#editor').summernote('code', this.slider.texto);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        updateSlider() {
            let formData = new FormData();
            formData.append('idSlider', 1);
            formData.append('foto', this.file);
            formData.append('jsonCodigoSlider', $('#editor').summernote('code').toString());
            axios.post('/api/updateSlider', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {

                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Header modificado con éxito');
                    this.$store.commit('mostrarComponente', 180);
                  
                })
                .catch(error => {
                    console.error(error);
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', error);
                });


        },
        summerNote() {
            console.log(this.getSummer)
            if (this.getSummer === null && this.getSummer !== true || this.getSummer === undefined) {
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
    },
    mounted() {
        this.summerNote();
        this.obtenerSliderInformacion();

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

button {
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
    width: 569px;
    height: 105px;
}

.imagen2 {
    width: 206px;
    height: 34px;
}
</style>
