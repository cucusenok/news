<template>

    <div class="post-list-container">

        <h1 v-if="posts">Список постов</h1>

        <PostItem
                  v-for="post in posts"
                  v-bind:post="post"
                  v-bind:key="post.id">
        </PostItem>


        <Pagination
            v-bind:currentPage="currentPage"
            v-bind:lastPage="lastPage"
            v-bind:routePath="'posts'"
            v-on:paginationChange="paginationChange">
        </Pagination>

    </div>



</template>

<script>
    import PostItem from './PostItem'
    import Pagination from '../Pagination'

    export default {
        name: "PostList",

        data: function(){
            return{
                currentPage:1,
                lastPage:false,
                posts: false,
            }
        },

        mounted() {
            this.setSpinnerState(true);

            this.$on('paginationChange', function(data) {
                console.log(data)
            });

            this.apiRequest('post_list', '', {'page' :  this.$route.params.page})
                .then(response => response.json())
                .then(response => this.setDataAttributes(response));
            },

        methods:{
            setDataAttributes(response){
                console.log(response);
                console.log(response.current_page);
                this.currentPage = response.current_page;
                this.lastPage = response.last_page;
                this.posts = response.data;
                this.setSpinnerState(false);
            },

            setPostsAttributes(data){
                console.log(data)
            },

            getPaginationLink(page){
                this.generateLink('post_list', '',  {'page' : page});
            },

            paginationChange(data){
                console.log(data);
            }


        },

        components:{
          PostItem,
            Pagination,
        },

    }
</script>

<style scoped>

</style>