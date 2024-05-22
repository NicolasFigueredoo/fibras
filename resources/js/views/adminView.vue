<template>
    <div>
      <Navbar v-if="!isAdminRoute && !isAdminPanel && !isZonaPrivada"></Navbar>
      <router-view></router-view>
      <Footer v-if="!isAdminRoute && !isAdminPanel"></Footer>

    </div>
  </template>
  
  <script>
import Navbar from './components/Navbar.vue';
import Footer from './components/Footer.vue';

  export default {
    name: 'App',
    components: {
    Navbar,
    Footer
  },
  data() {
    return {
      isAdminRoute: false,
      isAdminPanel: false,
      isZonaPrivada: false
    };
  },
  created() {
    this.checkAdminRoute();
  },
  watch: {
    '$route'(to, from) {
      this.checkAdminRoute();
    }
  },
  methods: {
    checkAdminRoute() {
      this.isAdminRoute = this.$route.path.startsWith('/admin/login');
      this.isAdminPanel = this.$route.path.startsWith('/admin/panel');
      this.isZonaPrivada = this.$route.path.startsWith('/zonaPrivada');

    }
  }


   
  };
  </script>
  
 