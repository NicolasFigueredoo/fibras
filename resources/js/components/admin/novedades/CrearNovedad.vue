<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CREAR NOVEDAD</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-11">
                    <label class="form-label">Orden</label>
                <input type="text" class="form-control" id="orden">
                </div>

                <div class="col-lg-1 d-flex flex-column align-items-center">
                    <label class="form-check-label" for="checkbox3">Destacado</label>
                    <input type="checkbox" class="form-check-input" id="destacado">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4">
                    <label class="form-label">Epígrafe (Español)</label>
                <input type="text" class="form-control" id="epigrafe">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Etiqueta (Español)</label>
                <input type="text" class="form-control" id="etiqueta">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Título (Español)</label>
                <input type="text" class="form-control" id="titulo">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4">
                    <label class="form-label">Epígrafe (portugués)</label>
                <input type="text" class="form-control" id="epigrafeAlternativo">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Etiqueta (portugués)</label>
                <input type="text" class="form-control" id="etiquetaAlternativo">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Título (portugués)</label>
                <input type="text" class="form-control" id="tituloAlternativo">
                </div>
            </div>
        
            <div class="row mb-3 mt-3">
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Texto (Español)</label>
                <textarea class="summernote" id="editor"></textarea>
                </div>
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Texto (portugués)</label>
                <textarea class="summernote" id="editorAlternativo"></textarea>
            </div>
               
            </div>
            <div class="mt-3">
                <label class="form-label">Portada (Tamaño recomendado 809x572)</label>
                <input type="file" ref="fotoSlider" class="form-control" id="imgs" @change="guardarFoto()">
            </div>


            <div class="w-100 d-flex justify-content-end">
                <button @click="crearNovedad()" type="button" class="btn"
                    style="background-color: #7F7F7F; color: white;">Crear</button>
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
            $('#titulo').val('');
            $('#epigrafe').val('');
            $('#etiqueta').val('');
            $('#imgs').val('');
        },
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        crearNovedad() {
            let destacado = $('#destacado').prop("checked");
            let destacadoEnviar = 0;
            if(destacado == true){
                destacadoEnviar = 1;
            }
            let formData = new FormData();
            formData.append('foto', this.foto);
            formData.append('texto', $('#editor').summernote('code').toString());
            formData.append('textoAlternativo', $('#editorAlternativo').summernote('code').toString());
            formData.append('orden', $('#orden').val());
            formData.append('titulo', $('#titulo').val());
            formData.append('tituloAlternativo', $('#tituloAlternativo').val());
            formData.append('epigrafe', $('#epigrafe').val());
            formData.append('epigrafeAlternativo', $('#epigrafeAlternativo').val());
            formData.append('etiqueta', $('#etiqueta').val());
            formData.append('etiquetaAlternativo', $('#etiquetaAlternativo').val());
            formData.append('destacado',destacadoEnviar);

            axios.post('/api/crearNovedad', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Novedad creada con éxito');
                    this.$store.commit('mostrarComponente', 40);
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
            
            
            $('#editorAlternativo').summernote({
                    height: 300,
                });
                var noteBar = $('.note-toolbar');
                noteBar.find('[data-toggle]').each(function () {
                    $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
                });
                $('#editor').summernote({
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
