<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CONTACTO</h1>
        </div>


        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" :value="this.contacto.direccion">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" :value="this.contacto.email">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" :value="this.contacto.telefono">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label">Instagram (Link)</label>
                    <input type="text" class="form-control" id="instagram" :value="this.contacto.instagram">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Teléfono 2</label>
                    <input type="text" class="form-control" id="telefono2" :value="this.contacto.telefono_secundario">
                </div>
            </div>

            <div class="w-100 d-flex justify-content-end">

                <button @click="updateContacto()" type="button" class="btn mt-3"
                    style="background-color: rgb(127,127,127); color: white;">Guardar</button>

            </div>

        </form>

    </div>

</template>

<script>
import axios from 'axios';
import 'jquery';
export default {

    data() {
        return {
            contacto: []
        }
    },

    methods: {
        updateContacto() {
            axios.post('/api/updateContacto',
                {
                    direccion: $('#direccion').val(),
                    email: $('#email').val(),
                    telefono: $('#telefono').val(),
                    telefono2: $('#telefono2').val(),
                    instagram: $('#instagram').val()

                })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Contacto actualizado con éxito'); 
                    this.$store.commit('mostrarComponente', 13);
                })
                .catch(error => {
                    console.error(error);
                });


        },
        obtenerContacto() {
            axios.get('/api/obtenerContacto')
                .then(response => {
                    console.log(response.data)
                    this.contacto = response.data[0]
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.obtenerContacto();
    }
}
</script>


<style scoped>
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
button{
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
