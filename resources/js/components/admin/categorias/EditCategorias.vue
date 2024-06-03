<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR CATEGORIA</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-5">
                    <label class="form-label">Orden</label>
                    <input type="text" class="form-control" id="orden" v-model="orden" >
                </div>
                <div class="col-lg-2 d-flex flex-column align-items-center">
                    <label class="form-check-label" for="checkbox3">Destacada</label>
                    <input type="checkbox" class="form-check-input" id="destacado">
                </div>
            </div>

            <div class="row col-md-12 mt-4">
                <div class="col-lg-4">
                    <label class="form-label">Imagen tamaño recomendado (120x120)</label>
                    <input type="file" class="form-control" ref="img2" @change="guardarFotoFooter()">
                </div>

                <div class="col-lg-4">
                    <label class="form-label">Nombre (Español)</label>
                    <input type="text" class="form-control" id="titulo" v-model="nombre">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Nombre (Portugués)</label>
                    <input type="text" class="form-control" id="tituloAlternativo" v-model="nombreAlternativo">
                </div>
            </div>

            <div class="w-100 d-flex justify-content-end mt-3">
                <button @click="updateCategoria()" type="button" class="btn"
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
            orden: null,
            nombre: null,
            categoria: null,
            nombreAlternativo: null,
            productoDestacado: 0,
            imagen: null
        }

    },

    computed: {
        idCategoria() {
            return this.$store.getters['getIdCategoria'];
        },
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
        updateCategoria() {
            
            let destacado = $('#destacado').prop("checked");
            if (destacado === true) {
                this.productoDestacado = 1;
            }
            let formData = new FormData();
            formData.append('idCategoria', this.idCategoria);
            formData.append('orden', this.orden);
            formData.append('titulo', this.nombre);
            formData.append('tituloAlternativo', this.nombreAlternativo);
            formData.append('destacado', this.productoDestacado);
            formData.append('imagen', this.imagen);

            axios.post('/api/updateCategoria', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Categoria actualizada con éxito');
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
        obtenerCategoria() {
            axios.get(`/api/obtenerCategoria/${this.idCategoria}`)
                .then(response => {
                    console.log(response.data)
                    this.categoria = response.data
                    this.orden = response.data.orden;
                    this.nombre = response.data.nombre;
                    this.nombreAlternativo = response.data.nombreAlternativo;

                    if (response.data.destacado == 1) {
                        $('#destacado').prop('checked', true);
                    }
                   
                })
                .catch(error => {
                    console.error(error);
                });
        }
     
    },
    mounted() {
        this.obtenerCategoria();
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
