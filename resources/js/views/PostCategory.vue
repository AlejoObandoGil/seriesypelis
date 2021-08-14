<template>
    <div>
        <paginator :url="`/api/categorias/${this.category}`"/>
    </div>
</template>

<script>
// import PostList from '../components/PostList.vue'
// import PostShow from './PostShow.vue'
export default {
    props:['category']
}
</script>


