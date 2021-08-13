<template>
    <post-list :posts="posts"></post-list>
</template>

<script>
// import PostShow from './PostShow.vue'
export default {
//   components: { PostShow },
    props: ['category'],
    data(){
        return{
            posts: []
        }
    },

    mounted(){
        axios.get(`/api/categorias/${this.category}`)
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

