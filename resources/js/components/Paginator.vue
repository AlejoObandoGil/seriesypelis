<template>
    <div>
        <post-list :items="items"></post-list>
        <pagination :pagination="pagination" />
    </div>
</template>

<script>
import PostList from '../components/PostList.vue'
// import PostShow from './PostShow.vue'
export default {
    components: { PostList },
    props:['url'],
    data(){
        return{
            pagination:{},
            items: []
        }
    },
    mounted(){
    axios.get(`${ this.url }?page=${this.$route.query.page || 1}`)
        .then(res => {
            this.pagination = res.data
            this.items = res.data.data
            delete this.pagination.data
    })
    .catch(err => {
        console.log(err)
    })
},
}
</script>

<style lang="scss">
    .pagination{
        a.active{
            background-color: #1abc9c;
            color: white;
        }
    }

</style>
