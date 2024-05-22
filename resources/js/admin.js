import './bootstrap';
import '../../node_modules/bootstrap/dist/js/bootstrap';
import { createApp } from 'vue';
import store from './store/store.js';
import router from './router/index.js';

import App from './app.vue'

createApp({
	components: {
		App
	}
})
.use(store)
.use(router)
.mount('#app');