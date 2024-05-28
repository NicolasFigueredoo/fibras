<template>
    <div class="container">

        <div class="w-100 border-bottom d-flex justify-content-between">
            <h1>Galeria de {{ this.nombre }} </h1>

            <button type="button" class="btn mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
             style="background-color:  rgb(0, 0, 0,0.5); color: white;">Cargar Imagen</button>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col" class="encabezado">Orden</th>
                    <th scope="col" class="encabezado">Imagen</th>
                    <th scope="col" class="col-lg-1 encabezado">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="imagen in imagenes" :key="imagen.id">
                    <td>{{ imagen.orden }}</td>
                    <th><img class="imagen" style="width: 200px; height: 200px;" :src="getImagen(imagen.path)" alt=""></th>

                    <td>
                        <div  class="d-flex justify-content-center">
                            <button type="button" class="btn btn-sm btn-danger" style="margin-left: 15px; "
                                @click="eliminarImagen(imagen.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15"
                                    style="cursor: pointer;">
                                    <path fill="white"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </button>

                        </div>
                    </td>



                </tr>
            </tbody>
        </table>

    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cargar imagen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label class="form-label">Orden</label>
                        <input type="text" class="form-control" id="orden">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Imagen 454x448</label>
                        <input @change="guardarImagen()" type="file" ref="imagenProducto" class="form-control" id="imagen">

                    </div>

                </div>
                <div class="modal-footer">
                    <button @click="cargarImagen()" type="button" class="btn mb-1" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" id="crearProducto"
                        style="background-color:  rgb(0, 0, 0,0.5); color: white;">Cargar Imagen</button>
                </div>
            </div>
        </div>
    </div>



</template>

<script>
import axios from 'axios';

export default {


    data() {
        return {
            producto: null,
            nombre: null,
            imagenProducto: null,
            imagenes: []
        }
    },

    computed: {
        idProducto() {
            return this.$store.getters['getIdProducto'];
        },
    },
    methods: {

        eliminarImagen(id){
            axios.post('/api/eliminarImagen', {
                idImagen: id,
            }
            )
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Imagen eliminada con éxito');
                    this.obtenerProducto();

                })
                .catch(error => {
                    console.error('Error ingresar Admin:', error);
                });
        },
        guardarImagen() {
            const file = this.$refs.imagenProducto;
            this.imagenProducto = file.files[0]
        },

        cargarImagen() {
            axios.post('/api/guardarImagenProducto', {
                idProducto: this.idProducto,
                imagen: this.imagenProducto,
                orden: $('#orden').val()
            },
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }

            )
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Imagen agregada con éxito');
                    this.obtenerProducto();

                })
                .catch(error => {
                    console.error('Error ingresar Admin:', error);
                });



        },
        getImagen(fileName) {
            if (fileName) {
                const filePath = fileName.split('/').pop();
                return '/api/getImage/' + filePath
            }
        },
        obtenerProducto() {
            axios.get(`/api/obtenerProducto/${this.idProducto}`)
                .then(response => {
                    console.log(response.data)
                    this.producto = response.data
                    this.nombre = response.data.nombre
                    this.imagenes = response.data.imagenes
                })
                .catch(error => {
                    console.error(error);
                });
        }


    },
    mounted() {
        this.obtenerProducto()
    }
}
</script>

<style scoped></style>
