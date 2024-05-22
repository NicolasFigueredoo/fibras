<template>
    <div class="container">

        <div class="w-100 border-bottom d-flex justify-content-between">
            <h1>LITROS</h1>

            <button @click="crearLitro()" type="button" class="btn mb-1"
                 id="crearLitro" style="background-color:  #7F7F7F; color: white;">Crear Litro</button>
        </div>
        <div class="input-group mb-3 mt-2">
            <input type="text" class="form-control" placeholder="Buscar..." v-model="search" style="border-radius: 0%;">
        </div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col" class="col-lg-2 encabezado">Cantidad</th>
                    <th scope="col" class="col-lg-1 encabezado">imagen</th>
                    <th scope="col" class="col-lg-1 encabezado">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="litro in filteredLitros" :key="litro.id">
                    <td>{{ litro.cantidad }}</td>
                    <td class="d-flex justify-content-center align-items-center" >
                        <div style="width: 50px; height: 50px;">

                            <div :style="{
                            backgroundImage: `url(${getImagen(litro.imagen)})`,
                            backgroundSize: 'contain',
                            backgroundPosition: 'center',
                            backgroundRepeat: 'no-repeat',
                            width: '100%',
                            height: '100%'
                        }">
                        </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-sm" style="background-color: #7F7F7F;"
                                @click="editarLitro(202, litro.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15"
                                    style="cursor: pointer">
                                    <path fill="white"
                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                </svg>
                            </button>

                            <button type="button" class="btn btn-sm btn-danger" style="margin-left: 15px;  border:0px" @click="eliminarLitro(litro.id)">
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
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            litros: [],
            search: ''
        }
    },

    computed: {
        filteredLitros() {
            return this.litros.filter(litro => {
                return litro.cantidad.toString().includes(this.search);
            });
        }
    },
    methods: {
        eliminarLitro(idLitro){
            axios.post('/api/deleteLitro', {
                idLitro: idLitro
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Litro eliminado con éxito');  
                    this.obtenerLitros();
                })
                .catch(error => {
                    console.error(error);
                });
        },
        crearLitro(){
            this.$store.commit('mostrarComponente', 201);
        },
        getImagen(fileName) {
            if(fileName){
                const filePath = fileName.split('/').pop();
                return '/api/getImage/' + filePath
            }
        },
        editarLitro(idComponente, idLitro) {
            this.$store.commit('setLitroId', idLitro);
            this.$store.commit('mostrarComponente', idComponente);
        },
        obtenerLitros() {
            axios.get('/api/obtenerLitros')
                .then(response => {
                    this.litros = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.obtenerLitros();
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

.encabezado {
    background-color: rgb(0, 0, 0,0.5);
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

#crearLitro {
    font-size: 16px;
    color: black;
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
}
</style>
