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
    import Pagination from '../UI/components/Pagination'

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
            this.getPost(this.$route.params.page);
            },

        methods:{
            setDataAttributes(response){
                this.currentPage = response.current_page;
                this.lastPage = response.last_page;
                this.posts = response.data;
                this.setSpinnerState(false);
            },

            getPost(page){
                this.setSpinnerState(true);
                this.apiRequest('post_list', '', {'page' : page})
                    .then(response => response.json())
                    .then(response => this.setDataAttributes(response));
            },

            getPaginationLink(page){
                this.generateLink('post_list', '',  {'page' : page});
            },

            paginationChange(page){
                this.$router.push({ path: `/posts/${page}` });
                this.getPost(page);
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