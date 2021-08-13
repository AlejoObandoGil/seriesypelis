<template>
            <!-- ---------------------------------------HEADER------------------------------- -->
    <section class="posts container">

        <post-list-item v-for="post in posts" :key="post.id" :post="post"></post-list-item>
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
import PostListItem from './PostListItem.vue'
export default {
  components: { PostListItem },
    props: ['posts'],
}
</script>
