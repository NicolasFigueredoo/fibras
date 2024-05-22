<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>CREAR PRODUCTO</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-md-8">
                    <label class="form-label">Nombre producto</label>
                    <input type="text" class="form-control" id="nombre">

                </div>
                <div class="col-md-2 d-flex flex-column align-items-center">
                    <label class="form-check-label" for="checkbox3">Destacado</label>
                    <input type="checkbox" class="form-check-input" id="destacado">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Orden</label>
                    <input type="text" class="form-control" id="orden">
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea class="summernote" id="editor"></textarea>
            </div>

            <div class="tabla table-responsive">
                <p class="presupuestoText">AGREGAR TABLA PRODUCTO</p>
                <table class="table">
                    <thead style="height: 40px">
                        <tr>
                            <th scope="col" class="encabezado">Código</th>
                            <th scope="col" class="encabezado">Tamaño</th>
                            <th scope="col" class="encabezado">Pack</th>
                            <th scope="col" class="encabezado">Código de barras</th>
                            <th class="encabezado"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding-left: 0px;">
                                <input type="text" class="form-control" id="codigo" v-model="codigo">

                            </td>
                            <td>
                                <input type="text" class="form-control" id="tamaño" v-model="tamaño">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="pack" v-model="pack">

                            </td>
                            <td>
                                <input type="text" class="form-control" id="codigoBarra" v-model="barraCodigo">

                            </td>

                            <td id="buttonAgregar" style="padding-right: 0px; padding-left: 0px">
                                <button id="agregar" type="button"  class="btn btn-primary"
                                    @click="agregarSubProducto">
                                    Agregar
                                </button>
                            </td>
                        </tr>


                        <tr v-for="(subProducto, index) in subProductos" :key="index">

                            <td>{{ subProducto.codigo }}</td>
                            <td>{{ subProducto.tamaño }}</td>
                            <td>{{ subProducto.pack }}</td>
                            <td>{{ subProducto.codigobarra }}</td>
                            <td id="botonAgregar" style="padding-right: 0px; padding-left: 0px">
                                <button type="button" class="btn btn-danger"
                                    @click="deleteSubProducto(subProducto.idSubProducto)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </button>
                            </td>

                        </tr>



                    </tbody>
                </table>
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
            productoDestacado: null,
            codigo: null,
            tamaño: null,
            pack: null,
            barraCodigo: null,
            subProductos: [],
            subProductoCount: 1

        }

    },
    computed: {
        getSummer() {
            return this.$store.getters['getSummer'];
        }
    },
    methods: {

        resetCampos(){
            $('#nombre').val('')
            $('#destacado').prop('checked', false)
            $('#orden').val('')
        },
        deleteSubProducto(id){
            this.subProductos = this.subProductos.filter(subProducto => subProducto.idSubProducto !== id);

        },
        agregarSubProducto() {

            if (this.codigo && this.tamaño && this.pack && this.barraCodigo) {

                const nuevoSubproducto = {
                    idSubProducto: this.subProductoCount,
                    codigo: this.codigo,
                    tamaño: this.tamaño,
                    pack: this.pack,
                    codigobarra: this.barraCodigo,
                };

                this.subProductos.push(nuevoSubproducto);
                this.subProductoCount += 1;
                this.codigo = '';
                this.tamaño = '';
                this.pack = '';
                this.barraCodigo = '';

            }


        },
        crearProducto() {


     
            let destacado = $('#destacado').prop("checked");


            if (destacado === true) {
                this.productoDestacado = 1;
            }else{
                this.productoDestacado = 0;
            }



            axios.post('/api/crearProducto', {
                orden: $('#orden').val(),
                nombre: $('#nombre').val(),
                texto:$('#editor').summernote('code').toString(),
                destacado: this.productoDestacado,
                subproductos: this.subProductos

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
                    this.resetCampos();


                })
                .catch(error => {
                    $('.mensaje').html('<p class="text-danger">Faltan completar campos</p>')
                    console.error('Error ingresar Admin:', error);
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


                $('#editor').summernote('code', '');

        },
    },

    mounted() {

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