<template>
    <div>
      <router-view></router-view>
    </div>
  </template>
  
  <script>


  export default {
    name: 'App',
  data() {
    return {
      isAdminRoute: false,
      isAdminPanel: false,
      isZonaPrivada: false
    };
  }  
  };
  </script>
  
 