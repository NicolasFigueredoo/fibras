<template>
    <div class="container">
        <div class="w-100 border-bottom">
            <h1>EDITAR LITRO</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-11">
                    <label class="form-label">Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" :value="this.litro.cantidad">
                </div>
                <div class="col-lg-1 mt-3">
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
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label">Imagen</label>
                <input type="file" ref="fotoSlider" class="form-control" id="imgs" @change="guardarFoto()">

            </div>

            <div class="w-100 d-flex justify-content-end mt-3">
                <button @click="updateLitro()" type="button" class="btn"
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
            jsonCodigoSlider: '',
            foto: null,
            orden: null,
            litro: ''
        }
    },
    computed: {
        idLitro() {
            return this.$store.getters['getIdLitro'];
        },
        idComponente() {
            return this.$store.getters['getMostrarComponente'];
        },
    },
    methods: {
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0];
        },
        getImagen(fileName) {
            if(fileName){
                const filePath = fileName.split('/').pop();
                return '/api/getImage/' + filePath
            }
        },
        updateLitro() {
            let formData = new FormData();
            formData.append('idLitro', this.idLitro);
            formData.append('imagen', this.foto);
            formData.append('orden', $('#orden').val());
            formData.append('cantidad', $('#cantidad').val());

            axios.post('/api/updateLitro', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Litro modificado con éxito');
                    this.$store.commit('mostrarComponente', 200);
                })
                .catch(error => {
                    console.error(error);
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', error);
                });
        },
        obtenerLitro() {
            axios.get(`/api/obtenerLitro/${this.idLitro}`)
                .then(response => {
                    this.litro = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.obtenerLitro();
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
