import { createRouter, createWebHashHistory } from 'vue-router';

import panelView from '../views/panelView.vue';
import loginAdmin from '../components/admin/login/Login.vue';


const routes = [
    {
        path: '/',
        name: 'login',
        component: loginAdmin
    },
    {
        path: '/panel',
        name: 'panel',
        component: panelView
    }
];


const router = createRouter({
    mode:'hash',
    history: createWebHashHistory(),
    routes
});


export default router;
