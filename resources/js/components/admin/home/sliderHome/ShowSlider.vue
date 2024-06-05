<template>
    <div class="container">

        <div class="w-100 border-bottom d-flex justify-content-between">
            <h1>SLIDERS</h1>

            <button @click="crearSlider()" type="button" class="btn mb-1"
                 id="crearSlider"   style="background-color:  #7F7F7F; color: white;">Crear Slider</button>
        </div>
        <div class="input-group mb-3 mt-2">
            <input type="text" class="form-control" placeholder="Buscar..." v-model="search" style="border-radius: 0%;">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col" class="col-sm-1 encabezado">Orden</th>
                        <th scope="col" class="encabezado">Texto</th>
                        <th scope="col" class="col-sm-2 encabezado">Archivo</th>
                        <th scope="col" class="col-sm-1 encabezado">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="slider in filteredSliders" :key="slider.id">
                        <td>{{ slider.orden }}</td>
                        <td>
                            <div v-html="slider.texto"></div>
                        </td>
                        <td style="height:100px;" >
                            <template v-if="!isImage(slider.imagen)">
    
                                <img class="imagen" :src="getImagen(slider.imagen)" alt="">
    
                            </template>
    
                            <div v-else class="d-flex justify-content-center align-items-center" >
                                <p>Video</p>
    
                            </div>
                            
                        
                        </td>
                        <td >
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-sm" style="background-color: #7F7F7F; "
                                    @click="editarSlider(2, slider.id)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15"
                                        style="cursor: pointer">
                                        <path fill="white"
                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                    </svg>
                                </button>
        
                                <button type="button" class="btn btn-sm btn-danger" style="margin-left: 15px;  border:0px " @click="eliminarSlider(slider.id)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15"
                                        style="cursor: pointer;">
                                        <path fill="white"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                </button>
    
                            </div>
                        </td>
    
    
    
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            sliders: [],
            search: ''
        }
    },

    computed: {
        idComponente() {
            return this.$store.getters['getMostrarComponente'];
        },
        filteredSliders() {
            return this.sliders.filter(slider => {
            return slider.texto.toLowerCase().includes(this.search.toLowerCase());
    });
  }
    },
    methods: {
        isImage(url) {
            if(url){

                const extension = url.split('.').pop().toLowerCase();
                return ['mp4','mov'].includes(extension);
            }
        },

        eliminarSlider(idSlider){
        axios.post('/api/deleteSlider',{
            idSlider: idSlider
        })
                .then(response => {
                    this.$store.commit('setMostrarAlerta', true);
                    this.$store.commit('setClaseAlerta', 1);
                    this.$store.commit('setMensajeAlerta', 'Slider eliminado con éxito');  
                    this.obtenerSliders();
                })
                .catch(error => {
                    console.error(error);
                });
    },
        crearSlider(){
            if(this.idComponente == 1){
                this.$store.commit('mostrarComponente', 29);
            }else{
                this.$store.commit('mostrarComponente', 434);

            }
        },
        getImagen(fileName) {
            if(fileName){
                const filePath = fileName.split('/').pop();
                return '/api/getImage/' + filePath
            }
        },
        editarSlider(idComponente, idSlider) {
            this.$store.commit('setSliderIdComponent', idSlider);
            this.$store.commit('mostrarComponente', idComponente);
        },
        obtenerSliders() {
            axios.get('/api/obtenerSliders')
                .then(response => {


                    if(this.idComponente == 433){

                        response.data.forEach(element => {
                            if(element.seccion == 'home')
                            this.sliders.push(element);
                        });
                    }else{
                        response.data.forEach(element => {
                            if(element.seccion == 'nosotros')
                            this.sliders.push(element);
                        });
                    }

                    
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.obtenerSliders();
        console.log(this.idComponente)
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

.encabezado {
    background-color: rgb(0, 0, 0,0.5);
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

.imagen {
    width: 100%;
    height: 100%;
}

#crearSlider{
    font-size: 16px;
    color: black;
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
}


</style>
