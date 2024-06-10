<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CREAR PRODUCTO</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label">Orden</label>
                    <input type="text" class="form-control" id="orden">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6">
                    <label class="form-label">Nombre (Español)</label>
                    <input type="text" class="form-control" id="nombre">
                </div>

                <div class="col-lg-6">
                    <label class="form-label">Nombre (Portugués)</label>
                    <input type="text" class="form-control" id="nombreAlternativo">
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


        <div class="row mt-3">

                <div class="col-md-6">
                        <label class="form-label">Seleccionar Categorias</label>
                        <select @change="categoriaSelect()" id="categoriaSelect" class="form-select"
                            aria-label="Default select example" style="height: 50px;">
                            <option selected>Seleccionar</option>
                            <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">{{categoria.nombre}}</option>
    
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mt-3">Categorias</label>
                        <div id="contenedorCategorias w-100">
                            <button v-for="cat in catSelect" :key="cat.id" type="button" class="btn"
                                style="background-color: #7F7F7F; color: white; margin-bottom:10px; margin-right: 10px;">
                                {{ cat.nombre }}
                                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"
                                    @click="deleteCat(cat.id)">
                                    <path fill="#ffffff"
                                        d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                            </button>
                        </div>
                    </div>

        </div>

            <div class="mensaje">
            </div>
            <div class="w-100 d-flex justify-content-end">
                <button @click="crearProducto()" type="button" class="btn mt-3"
                    style="background-color: #7F7F7F; color: white; margin-bottom: 4%;">Crear</button>
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
            categorias: [],
            catSelect: [],


        }

    },
    computed: {
        getSummer() {
            return this.$store.getters['getSummer'];
        }
    },
    methods: {

        
        categoriaSelect() {
            let cat = this.categorias.find(categoria => categoria.id == $('#categoriaSelect').val());
            let existingCategoria = this.catSelect.find(categoria => categoria.id == cat.id);
            if (!existingCategoria) {
            let categoria = { id: cat.id, nombre: cat.nombre }
            this.catSelect.push(categoria);}
        },
        resetCampos() {
            $('#nombre').val('')
            $('#nombreAlternativo').val('')

            $('#destacado').prop('checked', false)
            $('#orden').val('')
        },
  
        deleteCat(id) {
            this.catSelect = this.catSelect.filter(cat => cat.id !== id);
        },
        crearProducto() {
            axios.post('/api/crearProducto', {
                orden: $('#orden').val(),
                nombre: $('#nombre').val(),
                texto: $('#editor').summernote('code').toString(),
                nombreAlternativo: $('#nombreAlternativo').val(),
                textoAlternativo: $('#editorAlternativo').summernote('code').toString(),
                destacado: this.productoDestacado,
                categorias: this.catSelect,

            },
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }

            )
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Producto creado con éxito');
                    this.$store.commit('mostrarComponente', 25);
                    $('#editor').summernote('code', '');
                    $('#editorAlternativo').summernote('code', '');
                    $('#editor').summernote('destroy');
                    $('#editorAlternativo').summernote('destroy');

                    this.resetCampos();


                })
                .catch(error => {
                    $('.mensaje').html('<p class="text-danger">Faltan completar campos</p>')
                    console.error('Error ingresar Admin:', error);
                });

        },
        summerNote() {
                $('#editor').summernote({
                    height: 300,
                });

                $('#editorAlternativo').summernote({
                    height: 300,
                });
                var noteBar = $('.note-toolbar');
                noteBar.find('[data-toggle]').each(function () {
                    $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
                });

                this.$store.commit('setSummer', true);
            



        },
        obtenerCategorias() {
            axios.get('/api/obtenerCategorias')
                .then(response => {
                    this.categorias = response.data
                    
                })
                .catch(error => {
                    console.error(error);
                });
        },
 
    },

    mounted() {
        this.obtenerCategorias();
        this.summerNote();
        this.resetCampos();


    }
}
</script>


<style scoped>
.form-check-input:checked {
    background-color: #7F7F7F;
    border-color: #7F7F7F;
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

.encabezado {
    background: #7F7F7F;
    color: white;
}

#agregar {
    background: #7F7F7F;
    color: white;
    border: none;

}
</style>