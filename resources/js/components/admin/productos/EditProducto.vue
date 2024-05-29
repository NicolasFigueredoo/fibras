<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>EDITAR PRODUCTO</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-md-10">
                    <label class="form-label">Nombre producto</label>
                    <input type="text" class="form-control" id="nombre" :value="this.nombre">

                </div>
         
                <div class="col-md-2">
                    <label class="form-label">Orden</label>
                    <input type="text" class="form-control" id="orden" :value="this.orden">
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>


            <div class="row">

                <div class="row col-lg-6">
                    <div class="d-flex flex-column col-md-6">
                        <label class="form-label">Seleccionar Categorias</label>
                        <select @change="categoriaSelect()" id="categoriaSelect" class="form-select"
                            aria-label="Default select example" style="height: 50px;">
                            <option selected>Seleccionar</option>
                            <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">
                                {{ categoria.nombre }}</option>

                        </select>

                        <label class="form-label mt-3">Categorias</label>
                        <div id="contenedorCategorias w-100">
                            <button v-for="cat in catSelect" :key="cat.id" type="button" class="btn m-1"
                                style="background-color: #7F7F7F; color: white;">
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

                <div class="row col-lg-6">


                    <div class="d-flex flex-column col-md-6">
                        <label class="form-label">Seleccionar Litros</label>
                        <select @change="litroSelect()" id="litroSelect" class="form-select"
                            aria-label="Default select example" style="height: 50px;">
                            <option selected>Seleccionar</option>
                            <option v-for="litro in litros" :key="litro.id" :value="litro.id">{{ litro.cantidad }}L
                            </option>

                        </select>

                        <label class="form-label mt-3">Litros</label>
                        <div id="contenedorAplicaciones" style="width: 100%;">
                            <button v-for="lit in litSelect" :key="lit.id" type="button" class="btn m-1"
                                style="background-color: #7F7F7F; color: white">
                                {{ lit.cantidad }}L
                                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"
                                    @click="deleteLit(lit.id)">
                                    <path fill="#ffffff"
                                        d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Ficha técnica</label>
                    <input @change="guardarFichaFile" type="file" ref="guardarFicha" class="form-control" id="imagen">
                </div>
                <div class="col-md-6">
                    <label class="form-label mt-2">Hoja de seguridad</label>
                    <input @change="guardarHojaFile" type="file" ref="guardarHoja" class="form-control" id="imagen">
                </div>


            </div>


            <div class="mensaje">
            </div>
            <div class="w-100 d-flex justify-content-end">
                <button @click="updateProducto()" type="button" class="btn mt-3"
                    style="background-color: #7F7F7F; color: white; margin-bottom: 4%;">Actualizar</button>
            </div>
        </form>

    </div>

</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            orden: null,
            nombre: null,
            categorias: [],
            litros: [],
            litSelect: [],
            catSelect: [],
            guardarHoja: null,
            guardarFicha: null



        }
    },

    computed: {
        idProducto() {
            return this.$store.getters['getIdProducto'];
        },
    },
    methods: {
        guardarHojaFile() {
            const file = this.$refs.guardarHoja;
            this.guardarHoja = file.files[0]
        },
        guardarFichaFile() {
            const file = this.$refs.guardarFicha;
            this.guardarFicha = file.files[0]

        },
        updateProducto() {
            console.log(this.guardarHoja, this.guardarFicha)

            axios.post('/api/updateProducto', {
                idProducto: this.idProducto,
                orden: $('#orden').val(),
                nombre: $('#nombre').val(),
                texto: $('#editor').summernote('code').toString(),
                destacado: this.productoDestacado,
                categorias: this.catSelect,
                litros: this.litSelect,
                hojaSeguridad: this.guardarHoja,
                fichaTecnica: this.guardarFicha

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
                    this.$store.commit('setMensajeAlerta', 'Producto actualizado con éxito');
                    this.$store.commit('mostrarComponente', 25);

                })
                .catch(error => {
                    console.error('Error ingresar Admin:', error);
                });

        },
        obtenerProducto() {

            axios.get(`/api/obtenerProducto/${this.idProducto}`)
                .then(response => {
                    this.nombre = response.data.nombre
                    this.orden = response.data.orden
                    this.catSelect = response.data.categorias
                    this.litSelect = response.data.litros

                    if (response.data.destacado == 1) {
                        $('#destacado').prop('checked', true);
                    }
                    $('#editor').summernote('code', response.data.texto);


                })
                .catch(error => {
                    console.error(error);
                });
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
        obtenerLitros() {
            axios.get('/api/obtenerLitros')
                .then(response => {
                    this.litros = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        deleteLit(id) {
            this.litSelect = this.litSelect.filter(lit => lit.id !== id);
        },
        deleteCat(id) {
            this.catSelect = this.catSelect.filter(cat => cat.id !== id);
        },
        litroSelect() {
            let lit = this.litros.find(litro => litro.id == $('#litroSelect').val());
            let existingLitro = this.litSelect.find(litro => litro.id == lit.id);
            if (!existingLitro) {
            let litro = { id: lit.id, cantidad: lit.cantidad }
            this.litSelect.push(litro);
        }
        },
        categoriaSelect() {
            let cat = this.categorias.find(categoria => categoria.id == $('#categoriaSelect').val());
            let existingCategoria = this.catSelect.find(categoria => categoria.id == cat.id);
            if (!existingCategoria) {
            let categoria = { id: cat.id, nombre: cat.nombre }
            this.catSelect.push(categoria);}
        },
        summerNote() {
                $('#editor').summernote({
                    height: 300,
                });
                var noteBar = $('.note-toolbar');
                noteBar.find('[data-toggle]').each(function () {
                    $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
                });

                this.$store.commit('setSummer', true);
        },
    },
    mounted() {
        this.summerNote()
        this.obtenerProducto()
        this.obtenerCategorias()
        this.obtenerLitros()

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


#agregar {
    background: #7F7F7F;
    color: white;
    border: none;

}
</style>
