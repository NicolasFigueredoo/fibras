<template>
    <div class="container">
        <div class="w-100 border-bottom">
            <h1>CREAR LITRO</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <label class="form-label">Cantidad</label>
                    <input type="text" class="form-control" id="cantidad">
                </div>
            </div>
            <div class="mt-3">
                <label class="form-label">Imagen</label>
                <input type="file" ref="fotoSlider" class="form-control" id="imgs" @change="guardarFoto()">
            </div>

            <div class="w-100 d-flex justify-content-end mt-3">
                <button @click="crearLitro()" type="button" class="btn" style="background-color: #7F7F7F; color: white;">Crear</button>
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
            jsonCodigoSlider: '',
            foto: null,
            orden: null,
        }
    },
    methods: {
        resetCampos() {
            $('#orden').val('');
            $('#cantidad').val('');
        },
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0];
        },
        crearLitro() {
            let formData = new FormData();
            formData.append('imagen', this.foto);
            formData.append('orden', $('#orden').val());
            formData.append('cantidad', $('#cantidad').val());

            axios.post('/api/crearLitro', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Litro creado con éxito');
                    this.$store.commit('mostrarComponente', 200);
                    this.resetCampos();
                })
                .catch(error => {
                    console.error(error);
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', error);
                });
        },
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
