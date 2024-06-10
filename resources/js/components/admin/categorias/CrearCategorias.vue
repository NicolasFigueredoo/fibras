<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CREAR CATEGORIA</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-10">
                    <label class="form-label">Orden</label>
                    <input type="text" class="form-control" id="orden">
                </div>
            
                <div class="col-lg-2 d-flex flex-column align-items-center">
                    <label class="form-check-label" for="checkbox3">Destacada</label>
                    <input type="checkbox" class="form-check-input" id="destacado">
                </div>
                
            </div>

            <div class="row col-md-12 mt-4">
                <div class="col-lg-4">
                    <label class="form-label">Imagen tamaño recomendado (300x300)</label>
                    <input type="file" class="form-control" ref="img2" @change="guardarFotoFooter()">
                </div>

                <div class="col-lg-4">
                    <label class="form-label">Nombre (Español)</label>
                    <input type="text" class="form-control" id="titulo">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Nombre (Portugués)</label>
                    <input type="text" class="form-control" id="tituloAlternativo">
                </div>
            </div>

            <div class="w-100 d-flex justify-content-end mt-3">
                <button @click="crearCategoria()" type="button" class="btn"
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
            slider: '',
            productoDestacado: 0,
            imagen: null
        }

    },

    computed: {
        getSummer() {
            return this.$store.getters['getSummer'];
        }
    },
    methods: {

        guardarFotoFooter() {
            const file = this.$refs.img2;
            this.imagen = file.files[0]
        },
        resetCampos() {
            $('#orden').val('');
            $('#titulo').val('');
            $('#destacado').prop('checked', false)

        },
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        crearCategoria() {
            
            let destacado = $('#destacado').prop("checked");

            if (destacado === true) {
                this.productoDestacado = 1;
            }


            let formData = new FormData();
            formData.append('orden', $('#orden').val());
            formData.append('titulo', $('#titulo').val());
            formData.append('tituloAlternativo', $('#tituloAlternativo').val());
            formData.append('destacado', this.productoDestacado);
            formData.append('imagen', this.imagen);

            axios.post('/api/crearCategoria', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response.data)
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Categoria creada con éxito');
                    this.$store.commit('mostrarComponente', 190);
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
