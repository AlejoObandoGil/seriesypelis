<template>
        <!-- ---------------------------------------HEADER------------------------------- -->
    <section class="posts container">

        <article class="post" v-for="(post, index) in posts" :key="index">

            <!-- @if ($post->photos->count() === 1) -->
             <!-- <div class="img-center"> -->
                <!-- <img src="{{ $post->photos->first()->url }}" class="img-p"> -->
            <!-- </div> -->
            <!-- @elseif($post->photos->count() > 1)
                @include('posts.carousel')
            @endif -->
            <div class="content-post">
                <!-- header -->
                <post-header :post='post'></post-header>

<!-- ---------------------------------------CONTENT------------------------------- -->
                <div class="divider">
                    <p v-text="post.description"></p>
                </div>
    <!-- ---------------------------------------FOOTER------------------------------- -->
                <footer class="container-flex space-between">
                    <div class="read-more">
                        <!-- :to="`/inicio/${ post.url }`" -->
                        <router-link class="text-uppercase c-green" :to="{name: 'posts_show', params: {url: post.url}}" >Leer más</router-link>
                    </div>
                    <div class="tags container-flex">
                            <span class="tag c-gray-1 text-capitalize" v-for="(tag, index) in post.tags" :key="index">
                                <a href="#">#{{ tag.name }}</a>
                            </span>
                    </div>
                </footer>
            </div>
        </article>
        <!-- @empty -->
        <article class="post" v-if="! posts.length">

            <div class="content-post">

                <h1>No hay publicaciones todavia en esta categoria</h1>
            </div>
        </article>
        <!-- @endforelse -->
    </section>
</template>

<script>
// import PostShow from './PostShow.vue'
export default {
//   components: { PostShow },
    data(){
        return{
            posts: []
        }
    },

    mounted(){
        axios.get(`/api/categorias/${this.$route.params.category}`)
            .then(res => {
                this.posts = res.data.data
                console.log(this.posts)
        })
        .catch(err => {
            console.log(err)
        })
    }
}
</script>

