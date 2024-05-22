<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>Editar usuario</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-md-8">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" :value="this.usuario.usuario">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Rol</label>
                    
                    <select  id="rol" class="form-select"
                        aria-label="Default select example" style="height: 50px;">
                        <option :value="this.usuario.rol" selected>{{ this.usuario.rol }}</option>
                        <option value="administrador" >Administrador</option>
                        <option value="usuario" >Usuario</option>

                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" id="email" :value="this.usuario.email"> 
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="contraseña" > 
            </div>
        

            <button @click="updateUsuario()" type="button" class="btn"
                style="background-color: #7F7F7F; color: white;">Guardar</button>
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
            usuario: []
        }

    },
    computed:{
        idUsuario(){
            return this.$store.getters['getIdUsuario'];
        }
    },
    methods: {
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        updateUsuario() {
            axios.post('/api/updateUsuario', 
            {
                idUsuario: this.idUsuario,
                usuario: $('#usuario').val(),
                email: $('#email').val(),
                rol: $('#rol').val(),
                contraseña: $('#contraseña').val()

            }
            , {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Usuario actualizado con éxito'); 
                    this.$store.commit('mostrarComponente', 14);

                })
                .catch(error => {
                    console.error(error);
                });

                
        },
        obtenerUsuarioInformacion(){
            axios.get(`/api/obtenerIdUsuario/${this.idUsuario}`)
                .then(response => {
                    this.usuario = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.obtenerUsuarioInformacion();
        

    }

}
</script>

<style scoped>
.encabezado {
    background-color: #7F7F7F;
    color: white;
}
</style>
