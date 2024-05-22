<template>
    <div class="container" >

        <div class="w-100 border-bottom">
            <h1>CREAR SERVICIO</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-6">
                    <label class="form-label">Orden</label>
                <input type="text" class="form-control" id="orden">
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo">
                </div>
            </div>
            <div class="mt-3">
                <label class="form-label">Imagen (Tamaño recomendado 704x306)</label>
                <input type="file" ref="fotoSlider" class="form-control" id="imgs" @change="guardarFoto()">
            </div>
            <div class="mb-3 mt-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>

            <div class="w-100 d-flex justify-content-end">
                <button @click="crearServicio()" type="button" class="btn"
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
        },
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        crearServicio() {
            let formData = new FormData();
            formData.append('foto', this.foto);
            formData.append('texto', $('#editor').summernote('code').toString());
            formData.append('orden', $('#orden').val());
            formData.append('titulo', $('#titulo').val());

            axios.post('/api/crearServicio', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response.data)
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Servicio creado con éxito');
                    this.$store.commit('mostrarComponente', 50);
                    $('#editor').summernote('code', '');
                    this.resetCampos();



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
        this.resetCampos();


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
