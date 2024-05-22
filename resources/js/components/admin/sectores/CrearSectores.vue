<template>
    <div class="container" >

        <div class="w-100 border-bottom">
            <h1>CREAR SECTOR</h1>
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
                <label class="form-label">Imagen (Tamaño recomendado 288x376)</label>
                <input type="file" ref="fotoSlider" class="form-control" id="imgs" @change="guardarFoto()">
            </div>

            <div class="w-100 d-flex justify-content-end mt-3">
                <button @click="crearSector()" type="button" class="btn"
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
            foto: null,
            orden: null,
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
        crearSector() {
            let formData = new FormData();
            formData.append('foto', this.foto);
            formData.append('orden', $('#orden').val());
            formData.append('titulo', $('#titulo').val());

            axios.post('/api/crearSector', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Sector creado con éxito');
                    this.$store.commit('mostrarComponente', 195);
                    this.resetCampos();



                })
                .catch(error => {
                    console.error(error);
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', error);
                });


        },

    },

    mounted() {
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
