import './bootstrap';
import '../../node_modules/bootstrap/dist/js/bootstrap';

import { createApp } from 'vue';
import dowload from './components/Dowload.vue'
import formulario from './components/Formulario.vue'

createApp({
	components: {
		dowload
	}
}).mount('#appCalidad');

createApp({
	components: {
		formulario
	}
}).mount('#appContacto');