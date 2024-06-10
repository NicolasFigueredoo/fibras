import './bootstrap';
import '../../node_modules/bootstrap/dist/js/bootstrap';

import { createApp } from 'vue';
import formulario from './components/Formulario.vue'
import presupuesto from './components/Presupuesto.vue'

import VueRecaptcha from 'vue-recaptcha-v3';



const appContacto = createApp({
  components: {
    formulario
  }
});

const appPresupuesto = createApp({
  components: {
    presupuesto
  }
});

appContacto.use(VueRecaptcha, {
  siteKey: '6LdIAewpAAAAAGO1WyC2JZ5TLW2Xhpa0bfVVpUJR',
  loaderOptions: {
    useRecaptchaNet: true,
    autoHideBadge: true
  }
});

appContacto.mount('#appContacto');
appPresupuesto.mount('#appPresupuesto');
