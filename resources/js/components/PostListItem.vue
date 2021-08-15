<template>
    <article class="post">
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
                    <router-link
                        class="text-uppercase c-green"
                        :to="{name: 'posts_show', params: {url: post.url}}" >
                        Leer más
                    </router-link>
                </div>
                <div class="tags container-flex">
                    <span class="tag c-gray-1 text-capitalize" v-for="(tag, index) in post.tags" :key="index">
                        <tag-links :tag="tag"></tag-links>
                    </span>
                </div>
            </footer>
        </div>
    </article>
</template>

<script>
import TagLinks from './TagLinks.vue'
export default {
  components: { TagLinks },
    props: ['post'],
}
</script>
