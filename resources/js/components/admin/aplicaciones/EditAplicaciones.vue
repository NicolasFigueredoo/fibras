<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR APLICACIÓN</h1>
        </div>


        <form class="mt-3">
            <div class="mb-3">
                <label class="form-label">Orden</label>
                <input type="text" class="form-control" v-model="this.aplicacion.orden" id="orden">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen (Tamaño recomendado 220x223)</label>
                <input type="file" ref="fotoAplicacion" class="form-control" @change="guardarFoto()">
            </div>
            <div class="row mb-3">
                <div class="col-lg-6">
                    <label class="form-label">Nombre (Español)</label>
                    <input type="text" class="form-control" v-model="this.aplicacion.nombre" id="nombre">
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Nombre (Portugués)</label>
                    <input type="text" class="form-control" v-model="this.aplicacion.nombreAlternativo" id="nombreAlternativo">

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6">

                    <label for="exampleInputPassword1" class="form-label">Texto (Español)</label>
                    <textarea class="summernote" id="editor"></textarea>
                </div>
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Texto (Portugués)</label>
                    <textarea class="summernote" id="editorAlternativo"></textarea>
                </div>
            </div>

            <div class="w-100 d-flex justify-content-end mt-3">
                <button @click="updateAplicacion()" type="button" class="btn"
                    style="background-color: rgb(0, 0, 0,0.5); color: white;">Actualizar</button>
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
            aplicacion: ''
        }
    },

    computed: {
        idAplicacion() {
            return this.$store.getters['getIdAplicacion'];
        },

    },

    methods: {
        guardarFoto() {
            const file = this.$refs.fotoAplicacion;
            this.foto = file.files[0]
        },
        updateAplicacion() {
            let formData = new FormData();
            formData.append('idAplicacion', this.idAplicacion);
            formData.append('orden', $('#orden').val());
            formData.append('nombre', $('#nombre').val());
            formData.append('nombreAlternativo',$('#nombreAlternativo').val() );
            formData.append('texto', $('#editor').summernote('code').toString());
            formData.append('textoAlternativo', $('#editorAlternativo').summernote('code').toString());
            formData.append('imagen', this.foto);


            axios.post('/api/updateAplicacion', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Aplicacíon actualizada con éxito');
                    this.$store.commit('mostrarComponente', 10);

                })
                .catch(error => {
                    console.error(error);
                });
        },
        summerNote() {

            $('#editor').summernote({
                height: 300,
            });
            var noteBar = $('.note-toolbar');
            noteBar.find('[data-toggle]').each(function () {
                $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
            });


            $('#editorAlternativo').summernote({
                height: 300,
            });
            var noteBar = $('.note-toolbar');
            noteBar.find('[data-toggle]').each(function () {
                $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
            });


        },
        obtenerAplicacion() {
            axios.get(`/api/obtenerAplicacion/${this.idAplicacion}`)
                .then(response => {
                    this.aplicacion = response.data
                    $('#editor').summernote('code', this.aplicacion.texto);
                    $('#editorAlternativo').summernote('code', this.aplicacion.textoAlternativo);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.obtenerAplicacion();
        this.summerNote();
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

h1 {
    font-size: 28px;
    color: black;
    font-family: "Montserrat", sans-serif;
    font-weight: 700;
}
</style>
