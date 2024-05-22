<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CREAR SLIDER</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">orden</label>
                <input type="text" class="form-control" id="orden">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen (Tamaño recomendado 586x1400)</label>
                <input type="file" ref="fotoSlider" class="form-control" id="imgs" @change="guardarFoto()">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-lg-6">
                    <label class="form-label">Texto boton</label>
                    <input type="text" class="form-control" id="botonText">
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Link boton</label>
                    <input type="text" class="form-control" id="botonLink">
                </div>
            </div>

            <div class="w-100 d-flex justify-content-end">
                <button @click="crearSlider()" type="button" class="btn"
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
            jsonCodigoSlider: '',
            foto: null,
            orden: null,
            slider: ''
        }

    },

    computed: {
        getSummer() {
            return this.$store.getters['getSummer'];
        }
    },
    methods: {
        resetCampos(){
            $('#orden').val('');
            $('#botonText').val('');
            $('#botonLink').val('');
            $('#imgs').val('');
        },
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        crearSlider() {
            let formData = new FormData();
            formData.append('foto', this.foto);
            formData.append('jsonCodigoSlider', $('#editor').summernote('code').toString());
            formData.append('orden', $('#orden').val());
            formData.append('textoboton', $('#botonText').val());
            formData.append('linkboton', $('#botonLink').val());

            axios.post('/api/crearSlider', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Slider creado con éxito');
                    this.$store.commit('mostrarComponente', 1);
                    this.resetCampos();
                    $('#editor').summernote('code', '');


                })
                .catch(error => {
                    console.error(error);
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', error);
                });


        },
        summerNote() {
            if (this.getSummer === null && this.getSummer !== true) {
                $('#editor').summernote({
                    height: 300,
                });
                var noteBar = $('.note-toolbar');
                noteBar.find('[data-toggle]').each(function () {
                    $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
                });

                this.$store.commit('setSummer', true);
            }


        }

    },

    mounted() {

        this.summerNote();


    } 

}
</script>

<style scoped>
.encabezado {
    background-color: #7F7F7F;
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
