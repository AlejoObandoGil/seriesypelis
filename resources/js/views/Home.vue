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
                <header class="container-flex space-between">
                    <div class="date">
                        {{ post.published_date }}
                        <!-- <span class="c-gris">Estreno: {{  }}</span> -->
                    </div>
                    <div class="post-category">
                        <span class="category text-capitalize">
                            <!-- <a href="{{ route('category.show', $post->category) }}"> -->
                            <a href="#"> {{ post.category.name }}
                            </a>
                        </span>
                    </div>
                </header>
                <h1 v-text="post.title"></h1>

<!-- ---------------------------------------CONTENT------------------------------- -->
                <div class="divider">
                    <p v-text="post.description"></p>
                </div>
    <!-- ---------------------------------------FOOTER------------------------------- -->
                <footer class="container-flex space-between">
                    <div class="read-more">
                        <a href="#" class="text-uppercase c-green">Leer más</a>
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
export default {
    data(){
        return{
            posts: []
        }
    },

    mounted(){
        axios.get('/api/posts')
            .then(res => {
                this.posts = res.data.data
        })
        .catch(err => {
            console.log(err)
        })
    }
}
</script>
