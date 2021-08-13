<template>
    <post-list :posts="posts"></post-list>
</template>

<script>
// import PostShow from './PostShow.vue'
export default {
//   components: { PostShow },
    props: ['tag'],
    data(){
        return{
            posts: []
        }
    },
    mounted(){
        this.getPost()
    },
    methods: {
        getPost(){
            return axios.get(`/api/etiquetas/${this.tag}`)
                    .then(res => {
                        this.posts = res.data.data
                        console.log(this.posts)
                    })
                    .catch(err => {
                        console.log(err)
                    })
                    }
    },
    // watch(){
    //     tag()
    //     this.getPost()
    // }
}
</script>

