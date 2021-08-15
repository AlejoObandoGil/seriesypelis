import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            // beforeEnter: authMiddleware,
            component: () => import('./views/Home.vue')
        },
        {
            path: '/archivo',
            name: 'archive',
            // beforeEnter: authMiddleware,
            component: () => import('./views/Archive.vue')
        },
        {
            path: '/nosotros',
            name: 'about',
            // beforeEnter: authMiddleware,
            component: () => import('./views/About.vue')
        },
        {
            path: '/inicio/:url',
            name: 'posts_show',
            props: true,
            // beforeEnter: authMiddleware,
            component: () => import('./views/PostShow.vue')
        },
        {
            path: '/categorias/:category',
            name: 'posts_category',
            props: true,
            // beforeEnter: authMiddleware,
            component: () => import('./views/PostCategory.vue')
        },
        {
            path: '/etiquetas/:tag',
            name: 'posts_tag',
            props: true,
            // beforeEnter: authMiddleware,
            component: () => import('./views/PostTag.vue')
        },
        {
            path: '*',
            name: '404',
            // beforeEnter: authMiddleware,
            component: () => import('./views/errors/404.vue')
        }
    ],
    linkExactActiveClass: 'active',
    mode: 'history',
    scrollBehavior(){
        return { x:0, y:0 }
    }
});

