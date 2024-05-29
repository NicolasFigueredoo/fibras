<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR SERVICIO</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-lg-4">
                    <label class="form-label">Orden</label>
                <input type="text" class="form-control" id="orden" :value="this.servicio.orden">
                </div>
                <div class="col-lg-7">
                    <label class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" :value="this.servicio.titulo">
                </div>
            </div>
  
            <div class="mt-3">
                <label class="form-label">Portada (Tamaño recomendado 60x60)</label>
                <input type="file" ref="fotoSlider" class="form-control" id="imgs" @change="guardarFoto()">
            </div>
            <!-- <div class="mb-3 mt-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div> -->


            <div class="w-100 d-flex justify-content-end mt-3">
                <button @click="updateServicio()" type="button" class="btn"
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
            servicio: ''
        }

    },
    computed: {
        idServicio() {
            return this.$store.getters['getIdServicio'];
        },
        idComponente() {
            return this.$store.getters['getMostrarComponente'];
        },
        getSummer() {
            return this.$store.getters['getSummer'];
        }
    },
    methods: {
        guardarFoto() {
            const file = this.$refs.fotoSlider;
            this.foto = file.files[0]
        },
        updateServicio() {
            let formData = new FormData();
            formData.append('idServicio', this.idServicio);
            formData.append('foto', this.foto);
            formData.append('texto', $('#editor').summernote('code').toString());
            formData.append('orden', $('#orden').val());
            formData.append('titulo', $('#titulo').val());


            axios.post('/api/updateServicio', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {

                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Servicio modificado con éxito');
                    this.$store.commit('mostrarComponente', 50);
                  
                })
                .catch(error => {
                    console.error(error);
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 2);
                    this.$store.commit('setMensajeAlerta', error);
                });


        },
        summerNote() {
            if (this.getSummer === null && this.getSummer !== true) {
                $('#editor').summernote({
                    height: 300,
                });
                var noteBar = $('.note-toolbar');
                noteBar.find('[data-toggle]').each(function () {
                    $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
                });

                this.$store.commit('setSummer', true);
            }
        },
        obtenerServicio() {
            axios.get(`/api/obtenerServicio/${this.idServicio}`)
                .then(response => {
                    this.servicio = response.data;
                    $('#editor').summernote('code', this.servicio.texto);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    mounted() {

        this.summerNote();
        this.obtenerServicio();


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
