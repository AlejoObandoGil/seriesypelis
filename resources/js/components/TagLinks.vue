<template>
    <router-link
        class="text-uppercase c-green"
        :to="{name: 'posts_tag', params: {tag: tag.url }}" >
        #{{ tag.name }}
    </router-link>
</template>
<script>
export default {
    props: ['tag'],
}
</script>
