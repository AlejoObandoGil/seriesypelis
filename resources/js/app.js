require('./bootstrap');

import Vue from 'vue';
import router from './routes';
import PostHeader from './components/PostHeader.vue';

Vue.component('post-header', PostHeader);

const app = new Vue({
    el: '#app',
    router,
});
