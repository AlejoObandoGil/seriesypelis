<template>
    <div>
        <paginator :url="`/api/etiquetas/${this.tag}`"/>
    </div>
</template>

<script>
// import PostList from '../components/PostList.vue'
// import PostShow from './PostShow.vue'
export default {
    props:['tag']
}
</script>
