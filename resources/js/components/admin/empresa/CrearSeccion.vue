<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CREAR VALOR</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Orden</label>
                    <input type="text" class="form-control" id="orden">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo">
                </div>
            </div>
            <div class="row mt-3">
                <div>
                <label class="form-label">Imagen (Tamaño recomendado 80x80)</label>
                <input type="file" ref="fotoSlider" class="form-control" id="imgs" @change="guardarFoto()">
                </div>

            </div>
            <div class="mb-3 mt-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>

            <div class="w-100 d-flex justify-content-end mb-5">
                <button @click="crearSeccion()" type="btn" class="btn"
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
    data(){
        return{
            foto: null
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
            $('#titulo').val('');
        },
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        crearSeccion() {
            let formData = new FormData();
            formData.append('orden', $("#orden").val());
            formData.append('titulo', $("#titulo").val());
            formData.append('imagen', this.foto);
            formData.append('texto', $('#editor').summernote('code').toString());

            axios.post('/api/crearSeccion', formData, {})
                .then(response => {

                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Valor creado con éxito');
                    this.$store.commit('mostrarComponente', 32);
                    this.resetCampos()
                    $('#editor').summernote('code', '');

                })
                .catch(error => {
                    console.error(error);
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
