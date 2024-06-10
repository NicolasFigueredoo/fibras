<template>
    <div class="container">

        <div class="w-100 border-bottom d-flex justify-content-between">
            <h1>PRODUCTOS({{this.cantidadProductos}})</h1>

            <button @click="crearProducto()" type="button" class="btn mb-1" id="crearProducto"
                style="background-color:  rgb(0, 0, 0,0.5); color: white;">Crear Producto</button>
        </div>

        <div class="input-group mb-3 mt-2">
            <input type="text" class="form-control" placeholder="Buscar..." v-model="search" style="border-radius: 0%;">
        </div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col" class="col-sm-1 encabezado">orden</th>
                    <th scope="col" class="encabezado">Nombre</th>
                    <th scope="col" class="col-sm-1 encabezado">Imagen</th>
                    <th scope="col" class="col-sm-2 encabezado">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="producto in filteredProductos" :key="producto.id">
                    <th>{{ producto.orden }}</th>
                    <th>{{ producto.nombre }}</th>
                    <th v-if="producto.imagenes[0]"><img class="imagen" :src="getImagen(producto.imagenes[0].path)" alt=""></th>
                    <th v-else><p>No tiene imagenes</p></th>

                    <td class="d-flex justify-content-center">
                        <button type="button" class="btn btn-sm" style="background-color: #7F7F7F"
                            @click="editarProducto(28, producto.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15"
                                style="cursor: pointer">
                                <path fill="white"
                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                            </svg>
                        </button>

                        <button type="button" class="btn btn-sm" style="margin-left: 15px; background-color: #FAB005"
                            @click="verImagenes(27, producto.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15">
                                <path fill="#ffffff"
                                    d="M448 80c8.8 0 16 7.2 16 16V415.8l-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3V96c0-8.8 7.2-16 16-16H448zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                            </svg>
                        </button>

                        <button type="button" class="btn btn-sm btn-danger" style="margin-left: 15px; "
                            @click="eliminarProducto(producto.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15"
                                style="cursor: pointer;">
                                <path fill="white"
                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                            </svg>
                        </button>
                    </td>



                </tr>
            </tbody>
        </table>

    </div>

</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            productos: [],
            search: ''
        }
    },

    computed: {
        filteredProductos() {
            return this.productos.filter(productos => {
                return productos.nombre.toLowerCase().includes(this.search.toLowerCase());
            });
        }

    },


    methods: {
        crearProducto() {
            this.$store.commit('mostrarComponente', 26);
        },
        getImagen(fileName) {
            if (fileName) {
                const filePath = fileName.split('/').pop();
                return '/api/getImage/' + filePath
            }
        },

        verImagenes(idComponente, idProducto) {
            this.$store.commit('setProductoId', idProducto);
            this.$store.commit('mostrarComponente', idComponente);
        },
        editarProducto(idComponente, idProducto) {
            this.$store.commit('setProductoId', idProducto);
            this.$store.commit('mostrarComponente', idComponente);
        },
        obtenerProductos() {
            axios.get('/api/obtenerProductos')
                .then(response => {
                    this.productos = response.data
                    this.cantidadProductos = this.productos.length;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        eliminarProducto(idProducto) {
            axios.post('/api/deleteProducto', {
                idProducto: idProducto
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Producto eliminado con éxito');
                    this.obtenerProductos();
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.obtenerProductos();
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

.imagen {
    width: 100%;
    height: 100%;
}

#crearProducto {
    font-size: 16px;
    color: black;
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
}
</style>
