<template>
    <post-list :posts="posts"></post-list>
</template>

<script>
import PostList from '../components/PostList.vue'
// import PostShow from './PostShow.vue'
export default {
  components: { PostList },
//   components: { PostShow },
    data(){
        return{
            posts: []
        }
    },

    mounted(){
        axios.get('/api/posts')
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
