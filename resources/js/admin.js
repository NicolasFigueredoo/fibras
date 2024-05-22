import './bootstrap';
import '../../node_modules/bootstrap/dist/js/bootstrap';
import { createApp } from 'vue';
import store from './store/store.js';

import adminview from './views/adminView.vue'

createApp({
	components: {
		adminview
	}
})
.use(store)
.mount('#app');