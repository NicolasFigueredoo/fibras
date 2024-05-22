<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>SUSCRIPCIONES</h1>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col" class="encabezado">Email</th>
                    <th scope="col" class="col-sm-1 encabezado">Acciones</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="suscripcion in suscripciones" :key="suscripcion.id">
                    <td>{{ suscripcion.email }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" style="margin-left: 15px;" @click="deleteSuscripcion(suscripcion.id)">
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

    data(){
        return{
            suscripciones:[]
        }
    },
    
    methods:{
    deleteSuscripcion(id){
        axios.get(`/api/deleteSuscripcion/${id}`)
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Suscripcion eliminada con éxito');                 
                    this.$store.commit('mostrarComponente', 17);
                    this.Obtenersuscripciones();

                })
                .catch(error => {
                    console.error(error);
                });
    },
    Obtenersuscripciones(){
        axios.get('/api/obtenerSuscripciones')
                .then(response => {
                    this.suscripciones = response.data
                })
                .catch(error => {
                    console.error(error);
                });
    }
    },
    mounted(){
        this.Obtenersuscripciones();
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
</style>
