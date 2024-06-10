<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CREAR USUARIO</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-md-8">
                    <label class="form-label">Usuario</label>
                    <input type="text" v-model="this.usuario" class="form-control" id="usuario">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Rol</label>
                    
                    <select v-model="this.admin" id="aplicacionSelect" class="form-select"
                        aria-label="Default select example">
                        <option :value="0" selected>Usuario</option>
                        <option :value="1" >Administrador</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">Email</label>
                <input type="text" v-model="this.email" class="form-control" id="email">
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="text" v-model="this.contraseña" class="form-control" id="contraseña">
            </div>

            <div class="w-100 d-flex justify-content-end">
                <button @click="crearUsuario()" type="button" class="btn"
                    style="background-color: #7F7F7F; color: white;">Crear</button>

            </div>

        </form>



    </div>

</template>

<script>
import 'jquery';
import 'bootstrap';
import axios from 'axios';

export default {

    data() {
        return {
            usuario: null,
            email: null,
            contraseña: null,
            admin: null
        }

    },
    methods: {
        resetCampos(){
            $('#usuario').val('');
            $('#email').val('');
            $('#contraseña').val('');
        },
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        crearUsuario() {
            axios.post('/api/crearUsuario', {
                usuario: this.usuario,
                email: this.email,
                contraseña: this.contraseña,
                admin: this.admin
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Usuario creado con éxito'); 
                    this.$store.commit('mostrarComponente', 99);
                    this.resetCampos();
   
                })
                .catch(error => {
                    console.error('Error ingresar Admin:', error);
                });

        },
    },


}
</script>


<style scoped>
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
