import './bootstrap';
import '../../node_modules/bootstrap/dist/js/bootstrap';

import { createApp } from 'vue';
import Home from './components/Home.vue'

createApp({
	components: {
		Home
	}
}).mount('#app');