require('./bootstrap');

import Vue from 'vue';
import router from './routes';
import PostHeader from './components/PostHeader';
import PostList from './components/PostList';
import PostListItem from './components/PostListItem';

Vue.component('post-header', PostHeader);
Vue.component('post-list', PostList);
Vue.component('post-list-item', PostListItem);


const app = new Vue({
    el: '#app',
    router,
});
