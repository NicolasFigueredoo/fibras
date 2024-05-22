<template>
    <div class="container">

        <div v-if="this.claseAlerta === 1">
            <div v-if="mostrarAlerta" :class="'alert alert-success fade show'" data-aos="fade-down" role="alert">
            {{ this.mensajeAlerta }}
        </div>
        </div>
        <div v-else>
            <div v-if="mostrarAlerta" :class="'alert alert-danger fade show'" data-aos="fade-down" role="alert">
            {{ this.mensajeAlerta }}
        </div>
        </div>

    </div>

</template>

<script>
import 'jquery';
import 'bootstrap';
import AOS from 'aos';


export default {

    data() {
        return {
            foto: null,
            mostrarAlerta: true,
            animacion: 'fade-down'

        }

    },
    computed:{
        mensajeAlerta(){
            return this.$store.getters['getMensajeAlerta'];
        },
        claseAlerta(){
            return this.$store.getters['getAlertaClase'];
        },
    },
    methods: {

      
        
    },
    mounted(){
        AOS.init();
        setTimeout(() => {
            this.$store.commit('setMostrarAlerta', false);
            this.mostrarAlerta = false; 
          }, 3000);
    }

}
</script>

<style scoped>
.container{
    display: flex;
    justify-content: right;
    width: 40%;
}
.alerta{
    position: fixed;
    z-index: 5;
}

</style>
