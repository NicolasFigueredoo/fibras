import './bootstrap';

import { createApp } from 'vue';
import Home from './components/Home.vue'
import panelview from '../views/admin/panelView.vue'

createApp({
	components: {
		Home,
		panelview
	}
}).mount('#app');