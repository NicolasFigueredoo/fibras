import { createApp } from 'vue';
import App from './app.vue';
import router from './router/index.js';
import store from './store/store.js';

//bootstrap
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'; 


const app = createApp(App);
app.use(router);
app.use(store);
app.mount('#app'); 

