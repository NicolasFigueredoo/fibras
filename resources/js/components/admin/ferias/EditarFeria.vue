<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR FERIA</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-4">
                    <label class="form-label">Orden</label>
                <input type="text" class="form-control" id="orden" :value="this.novedad.orden">
                </div>
                <div class="col-lg-8">
                    <label class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" :value="this.novedad.titulo">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <label class="form-label">Epígrafe</label>
                <input type="text" class="form-control" id="epigrafe" :value="this.novedad.epigrafe">
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Etiqueta</label>
                <input type="text" class="form-control" id="etiqueta" :value="this.novedad.etiqueta">
                </div>
            </div>
            <div class="mb-3 mt-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>


            <div class="w-100 d-flex justify-content-end">
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
         
            let formData = new FormData();
            formData.append('idFeria', this.idNovedad);
            formData.append('texto', $('#editor').summernote('code').toString());
            formData.append('orden', $('#orden').val());
            formData.append('titulo', $('#titulo').val());
            formData.append('epigrafe', $('#epigrafe').val());
            formData.append('etiqueta', '');
            formData.append('destacado', 0);


            axios.post('/api/updateFeria', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {

                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Feria modificada con éxito');
                    this.$store.commit('mostrarComponente', 70);
                  
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
        },
        obtenerNovedadInformacion() {
            axios.get(`/api/obtenerFeria/${this.idNovedad}`)
                .then(response => {
                    this.novedad = response.data;
                    if (response.data.destacado == 1) {
                        $('#destacado').prop('checked', true);
                    }
                    $('#editor').summernote('code', this.novedad.texto);
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
