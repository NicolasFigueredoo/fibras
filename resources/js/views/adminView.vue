<template>
    <div class="admin-view">
        <PanelView />
    </div>
  </template>
  
  <script>
  import Login from "@/components/admin/login/Login.vue";
  import PanelView from './panelView.vue';

  
  export default {
    components: {
        Login,
        PanelView
    },
   
   
  };
  </script>
  

  