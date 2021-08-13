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
            path: '/categorias',
            name: 'categories',
            // beforeEnter: authMiddleware,
            component: () => import('./views/Categories.vue')
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
            // beforeEnter: authMiddleware,
            component: () => import('./views/PostShow.vue')
        },
        {
            path: '/categorias/:category',
            name: 'post_category',
            // beforeEnter: authMiddleware,
            component: () => import('./views/PostCategory.vue')
        },
        {
            path: '*',
            name: '404',
            // beforeEnter: authMiddleware,
            component: () => import('./views/errors/404.vue')
        }
    ],
    linkExactActiveClass: 'active'
});

