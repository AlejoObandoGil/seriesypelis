require('./bootstrap');

import Vue from 'vue';
import router from './routes';
import PostHeader from './components/PostHeader';
import PostList from './components/PostList';
import PostListItem from './components/PostListItem';
import DisqusComment from './components/DisqusComment';
import Pagination from './components/Pagination'
import Paginator from './components/Paginator'
import SocialLinks from './components/SocialLinks'
import TagLinks from './components/TagLinks'
import ContactForm from './components/ContactForm'

Vue.component('post-header', PostHeader);
Vue.component('post-list', PostList);
Vue.component('post-list-item', PostListItem);
Vue.component('disqus-comment', DisqusComment);
Vue.component('pagination', Pagination);
Vue.component('paginator', Paginator);
Vue.component('social-links', SocialLinks);
Vue.component('tag-links', TagLinks);
Vue.component('contact-form', ContactForm);


const app = new Vue({
    el: '#app',
    router,
});
