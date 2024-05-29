<template>
    <div class="container">

        <div class="w-100 border-bottom">
            <h1>LOGOS</h1>
        </div>

        <form class="mt-3" >
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">HEADER (Tamaño recomendado 79x103)</label>
                    <input type="file" class="form-control" ref="img3" @change="guardarFotoBlank()">
                </div>
                <div class="col-md-4">
                    <label class="form-label">FONDO BLANCO (Tamaño recomendado 79x103)</label>
                    <input type="file" class="form-control" ref="img1"  @change="guardarFotoNavbar()">
                </div>
                <div class="col-md-4">
                    <label class="form-label">FOOTER (Tamaño recomendado 79x103)</label>
                    <input type="file" class="form-control" ref="img2" @change="guardarFotoFooter()">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <img v-if="this.img3" class="imagen" :src="getImagen(this.img3)" alt="">
                </div>
                <div class="col-md-4">
                    <img v-if="this.img1" class="imagen" :src="getImagen(this.img1)" alt="">
                </div>

                <div class="col-md-4">
                    <img v-if="this.img2" class="imagen" :src="getImagen(this.img2)" alt="">
                </div>



            </div>

            <div class="w-100 d-flex justify-content-end">

                <button @click="updateLogo()" type="button" class="btn mt-3"
                    style="background-color: rgb(127,127,127); color: white;">Actualizar</button>

            </div>

        </form>

    </div>

</template>

<script>
import axios from 'axios';

export default {

    data(){
        return{
            logos:[],
            img1: null,
            img2: null,
            img3: null,
            foto1: null,
            foto2: null,
            foto3: null

        }
    },
    
    methods:{



        getImagen(fileName) {
            if(fileName){
                const filePath = fileName.split('/').pop();
                return '/api/getImage/' + filePath
            }
        },


        
        guardarFotoBlank() {
            const file = this.$refs.img3;
            this.foto3 = file.files[0]
        },

        guardarFotoNavbar() {
            const file = this.$refs.img1;
            this.foto1 = file.files[0]
        },

        guardarFotoFooter() {
            const file = this.$refs.img2;
            this.foto2 = file.files[0]
        },

        updateLogo() {
            axios.post('/api/updateLogo', 
            {
                logoNav: this.foto1,
                logoFooter: this.foto2,
                header: this.foto3

            },{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
        )
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Logos actualizados con éxito');                 
                    this.$store.commit('mostrarComponente', 19);
                    this.obtenerLogo();


                })
                .catch(error => {
                    console.error(error);
                });

                
        },
  
    obtenerLogo(){
        axios.get('/api/obtenerLogos')
                .then(response => {
                    this.logos = response.data
                    this.img1 = response.data.navbar
                    this.img2 = response.data.footer
                    this.img3 = response.data.header
                })
                .catch(error => {
                    console.error(error);
                });
    }
    },
    mounted(){
        this.obtenerLogo();
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
button{
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

.imagen{
    width: 103px;
height: 134px;
flex-shrink: 0;
}

</style>
