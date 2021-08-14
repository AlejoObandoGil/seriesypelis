<template>
    <section class="pages container">
    <div class="page page-archive">
        <h1 class="text-capitalize">Archivo de Categorias</h1>
        <p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
        <div class="divider-2" style="margin: 35px 0;"></div>
        <div class="container-flex space-between">
            <div class="authors-categories">
                <h3 class="text-capitalize">autores</h3>
                <ul class="list-unstyled">
                    <li v-for="(author, index) in authors" :key="index" v-text="author.name"></li>
                </ul>
                <h3 class="text-capitalize">categorias o géneros</h3>
                <ul class="list-unstyled">
                    <li class="text-capitalize" v-for="(category, index) in categories" :key="index">
                        <router-link
                            :to="{name: 'posts_category', params: {category: category.url}}">
                            {{ category.name }}
                        </router-link>
                    </li>
                </ul>
            </div>
            <div class="latest-posts">
                <h3 class="text-capitalize">Peliculas y Series recientes</h3>
                    <p class="text-capitalize" v-for="(post, index) in posts" :key="index">
                        <router-link
                            class="text-uppercase c-green"
                            :to="{name: 'posts_show', params: {url: post.url}}" >
                            {{ post.title }}
                        </router-link>
                    </p>
                <h3 class="text-capitalize">Películas y series por año</h3>
                <ul class="list-unstyled">
                    <li v-for="(date, index) in archive" :key="index">
                        {{ date.year }} ({{ date.posts }})
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
</template>
<script>
// import CategoriesVue from './Categories.vue'
export default {
    data(){
        return{
            authors: [],
            categories: [],
            posts: [],
            archive: []
        }
    },
    mounted() {
        axios.get('/api/archivo')
        .then(res => {
            this.authors = res.data.authors
            this.categories = res.data.categories
            this.posts = res.data.posts
            this.archive = res.data.archive

        })
    },
}
</script>
