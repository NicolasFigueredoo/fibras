<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR DESCARGA</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-6">
                    <label class="form-label">Orden</label>
                <input type="text" class="form-control" id="orden" :value="this.descarga.orden">
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" :value="this.descarga.titulo">
                </div>
            </div>
  
            <div class="mt-3">
                <label class="form-label">Archivo</label>
                <input type="file" ref="fotoSlider" class="form-control" id="imgs" @change="guardarFoto()">
            </div>


            <div class="w-100 d-flex justify-content-end mt-3">
                <button @click="updateDescarga()" type="button" class="btn"
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
            descarga: ''
        }

    },
    computed: {
        idDescarga() {
            return this.$store.getters['getIdDescarga'];
        },
        idComponente() {
            return this.$store.getters['getMostrarComponente'];
        },
    },
    methods: {
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        updateDescarga() {
            let formData = new FormData();
            formData.append('idDescarga', this.idDescarga);
            formData.append('file', this.foto);
            formData.append('orden', $('#orden').val());
            formData.append('titulo', $('#titulo').val());


            axios.post('/api/updateDescarga', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {

                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Descarga modificada con éxito');
                    this.$store.commit('mostrarComponente', 60);
                  
                })
                .catch(error => {
                    console.error(error);
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', error);
                });


        },
        obtenerDescarga() {
            axios.get(`/api/obtenerDescarga/${this.idDescarga}`)
                .then(response => {
                    console.log(response)
                    this.descarga = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.obtenerDescarga();


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
