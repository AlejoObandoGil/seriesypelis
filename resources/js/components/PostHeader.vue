<template>

    <header class="container-flex space-between">
        <div class="date">
            {{ post.published_date }}
            <!-- <span class="c-gris">Estreno: {{  }}</span> -->
        </div>
        <div class="post-category">
            <span class="category text-capitalize">
                <!-- <a href="{{ route('category.show', $post->category) }}"> -->
                <router-link :to="{name: 'post_category', params: {category: post.category.url}}"> {{ post.category.name }}
                </router-link>
            </span>
        </div>
        <h1 v-text="post.title"></h1>
    </header>
</template>

<script>
export default {
    props: ['post'],
    // data(){

    // },
}
</script>
