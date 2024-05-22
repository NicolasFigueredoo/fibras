<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR METADATO</h1>
        </div>

        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">seccion</label>
                <input type="text" class="form-control" :value="this.metadato.seccion">
            </div>
            <div class="mb-3">
                <label class="form-label">Keyword</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" :value="this.metadato.claves" id="floatingTextarea" style="height: 300px; "></textarea>
                </div>
            </div>

            <div class="w-100 d-flex justify-content-end mb-5">
                <button @click="updateMetadato()" type="button" class="btn"
                    style="background-color: #7F7F7F; color: white;">Guardar</button>
            </div>

        </form>

    </div>

</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            orden: '',
            nombre: '',
            foto: null,
            metadato: ''
        }
    },

    computed: {
        idMetadato() {
            return this.$store.getters['getIdMetadato'];
        },

    },

    methods: {
        guardarFoto() {
            const file = this.$refs.fotoAplicacion;
            this.foto = file.files[0]
        },
        updateMetadato() {

      

            axios.post('/api/updateMetadato', {
                claves: $('#floatingTextarea').val()
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Metadatos actualizados con éxito');
                    this.$store.commit('mostrarComponente', 90);

                })
                .catch(error => {
                    console.error(error);
                });
        },

        obtenerMetadato() {
            axios.get(`/api/obtenerMetadato/${this.idMetadato}`)
                .then(response => {
                    this.metadato = response.data
                    console.log(response.data)
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.obtenerMetadato()
    }

}
</script>

<style scoped>
.encabezado {
    background-color: #7F7F7F;
    color: white;
}
</style>
