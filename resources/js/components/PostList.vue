<template>
            <!-- ---------------------------------------HEADER------------------------------- -->
    <section class="posts container">

        <post-list-item v-for="post in items" :key="post.id" :post="post"></post-list-item>
        <!-- @empty -->
        <article class="post" v-if="! items.length">

            <div class="content-post">

                <h1>No hay publicaciones todavia en esta categoria</h1>
            </div>
        </article>
        <!-- @endforelse -->
    </section>
</template>
<script>
// import PostListItem from './PostListItem.vue'
export default {
//   components: { PostListItem },
    props: ['items'],
}
</script>
