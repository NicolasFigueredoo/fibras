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
                    <div>
                <label class="form-label">Imagen (Tamaño recomendado 60x60)</label>
                <input type="file" ref="fotoSlider" class="form-control" id="imgs" @change="guardarFoto()">
                </div>

                </div>
    
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-lg-6">
                    <label class="form-label">Título (Español)</label>
                    <input type="text" class="form-control" id="titulo">
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Título (Portugués)</label>
                    <input type="text" class="form-control" id="tituloAlternativo">
                </div>

            </div>
            <div class="row mb-3 mt-3">
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Texto (Español)</label>
                    <textarea class="summernote" id="editor"></textarea>
                </div>
                <div class="col-lg-6">

                    <label for="exampleInputPassword1" class="form-label">Texto (Portugués)</label>
                    <textarea class="summernote" id="editorAlternativo"></textarea>
                </div>
            </div>

            <div class="w-100 d-flex justify-content-end mb-5">
                <button @click="crearSeccion()" type="button" class="btn"
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
            formData.append('imagen', this.foto);
            formData.append('titulo', $("#titulo").val());
            formData.append('texto', $('#editor').summernote('code').toString());
            formData.append('tituloAlternativo', $("#tituloAlternativo").val());
            formData.append('textoAlternativo', $('#editorAlternativo').summernote('code').toString());

            axios.post('/api/crearSeccion', formData, {})
                .then(response => {

                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Valor creado con éxito');
                    this.resetCampos()
                    $('#editor').summernote('code', '');
                    $('#editor').summernote('destroy');
                    $('#editorAlternativo').summernote('destroy');
                    this.$store.commit('mostrarComponente', 32);

                })
                .catch(error => {
                    console.error(error);
                });


        },
        summerNote() {
                $('#editor').summernote({
                    height: 300,
                });

                $('#editorAlternativo').summernote({
                    height: 300,
                });
                var noteBar = $('.note-toolbar');
                noteBar.find('[data-toggle]').each(function () {
                    $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
                });

            
            


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
