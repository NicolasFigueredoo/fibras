<template>
    <div class="container" >

        <div class="w-100 border-bottom">
            <h1>EDITAR PRODUCTO</h1>
        </div>

        <form class="mt-3">
            <div class="row">
                <div class="col-md-8">
                    <label class="form-label">Nombre producto</label>
                    <input type="text" class="form-control" id="nombre" :value="this.nombre">

                </div>
                <div class="col-md-2 d-flex flex-column align-items-center">
                    <label class="form-check-label" for="checkbox3">Destacado</label>
                    <input type="checkbox" class="form-check-input" id="destacado">
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
                                <button id="agregar" type="button" class="btn btn-primary" @click="agregarSubProducto">
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
                                <button type="button" class="btn btn-danger" @click="deleteSubProducto(subProducto.id)">
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
            subProductos: [],
            orden: null,
            nombre: null,
            productoDestacado: 0,
            subProductoCount: 0



        }
    },

    computed: {
        idProducto() {
            return this.$store.getters['getIdProducto'];
        },
    },
    methods: {
        agregarSubProducto() {
            if(this.subProductos.length > 0){
                let idProductoSub = this.subProductos[this.subProductos.length - 1].id
                this.subProductoCount = idProductoSub + 1
            }

            if (this.codigo && this.tamaño && this.pack && this.barraCodigo) {

                const nuevoSubproducto = {
                    id: this.subProductoCount,
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

        deleteSubProducto(id) {
            this.subProductos = this.subProductos.filter(subProducto => subProducto.id !== id);
        },

        updateProducto() {
            let destacado = $('#destacado').prop("checked");

            if (destacado == true) {
                this.productoDestacado = 1;
            }

            axios.post('/api/updateProducto', {
                idProducto: this.idProducto,
                orden: $('#orden').val(),
                nombre: $('#nombre').val(),
                texto: $('#editor').summernote('code').toString(),
                destacado: this.productoDestacado,
                subproductos: this.subProductos

            },
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
        guardarFoto() {
            const file = this.$refs.fotoProduct;
            this.fotoProducto = file.files[0]
        },
        obtenerProducto() {

            axios.get(`/api/obtenerProducto/${this.idProducto}`)
                .then(response => {
                    console.log(response.data)
                    this.nombre = response.data.nombre
                    this.orden = response.data.orden
                    this.subProductos = response.data.sub_productos
                    if (response.data.destacado == 1) {
                        $('#destacado').prop('checked', true);
                    }
                    $('#editor').summernote('code', response.data.texto);


                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.obtenerProducto()
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
