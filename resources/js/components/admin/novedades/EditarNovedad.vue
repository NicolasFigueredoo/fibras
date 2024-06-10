<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR NOVEDAD</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-10">
                    <label class="form-label">Orden</label>
                <input type="text" class="form-control" id="orden" :value="this.novedad.orden">
                </div>
                <div class="col-lg-1 d-flex flex-column align-items-center">
                    <label class="form-check-label" for="checkbox3">Destacado</label>
                    <input type="checkbox" class="form-check-input" id="destacado">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4">
                    <label class="form-label">Epígrafe (Español)</label>
                <input type="text" class="form-control" id="epigrafe" :value="this.novedad.epigrafe">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Etiqueta (Español)</label>
                <input type="text" class="form-control" id="etiqueta" :value="this.novedad.etiqueta">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Título (Español)</label>
                <input type="text" class="form-control" id="titulo" :value="this.novedad.titulo">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-4">
                    <label class="form-label">Epígrafe (portugués)</label>
                <input type="text" class="form-control" id="epigrafeAlternativo" :value="this.novedad.epigrafeAlternativo">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Etiqueta (portugués)</label>
                <input type="text" class="form-control" id="etiquetaAlternativo" :value="this.novedad.etiquetaAlternativo">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Título (portugués)</label>
                <input type="text" class="form-control" id="tituloAlternativo" :value="this.novedad.tituloAlternativo">
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
          


            <div class="mt-3 w-100 d-flex justify-content-end">
                <button @click="updateNovedad()" type="button" class="btn"
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
            jsonCodigoSlider: '',
            foto: null,
            orden: null,
            novedad: ''
        }

    },
    computed: {
        idNovedad() {
            return this.$store.getters['getIdNovedad'];
        },
        idComponente() {
            return this.$store.getters['getMostrarComponente'];
        },
        getSummer() {
            return this.$store.getters['getSummer'];
        }
    },
    methods: {
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        updateNovedad() {
            let destacado = $('#destacado').prop("checked");
            let destacadoEnviar = 0;
            if(destacado == true){
                destacadoEnviar = 1;
            }
            let formData = new FormData();
            formData.append('idNovedad', this.idNovedad);
            formData.append('foto', this.foto);
            formData.append('orden', $('#orden').val());
            formData.append('texto', $('#editor').summernote('code').toString());
            formData.append('titulo', $('#titulo').val());
            formData.append('epigrafe', $('#epigrafe').val());
            formData.append('etiqueta', $('#etiqueta').val());
            formData.append('textoAlternativo', $('#editorAlternativo').summernote('code').toString());
            formData.append('tituloAlternativo', $('#tituloAlternativo').val());
            formData.append('epigrafeAlternativo', $('#epigrafeAlternativo').val());
            formData.append('etiquetaAlternativo', $('#etiquetaAlternativo').val());
            formData.append('destacado',destacadoEnviar);


            axios.post('/api/updateNovedad', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {

                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Novedad modificada con éxito');
                    this.$store.commit('mostrarComponente', 40);
                    $('#editor').summernote('destroy');
                    $('#editorAlternativo').summernote('destroy');
                  
                })
                .catch(error => {
                    console.error(error);
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', error);
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

            
        },
        obtenerNovedadInformacion() {
            axios.get(`/api/obtenerNovedad/${this.idNovedad}`)
                .then(response => {
                    this.novedad = response.data;
                    if (response.data.destacado == 1) {
                        $('#destacado').prop('checked', true);
                    }
                    $('#editor').summernote('code', this.novedad.texto);
                    $('#editorAlternativo').summernote('code', this.novedad.textoAlternativo);

                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.summerNote();
        this.obtenerNovedadInformacion();


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
