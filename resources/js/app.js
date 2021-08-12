require('./bootstrap');

import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

const router = new Router({
    routes: [
        {
            path: '/',
            name: 'Home',
            // beforeEnter: authMiddleware,
            component: () => import('./views/Home.vue')
        },
        {
            path: '/categorias',
            name: 'Categories',
            // beforeEnter: authMiddleware,
            component: () => import('./views/Categories.vue')
        },
        {
            path: '/Nosotros',
            name: 'About',
            // beforeEnter: authMiddleware,
            component: () => import('./views/About.vue')
        }
    ],
    linkExactActiveClass: 'active'
});

const app = new Vue({
    el: '#app',
    router,
});
