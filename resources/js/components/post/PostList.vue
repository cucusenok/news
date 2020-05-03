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
    import * as types from '../../store/types'
    import {mapState} from 'vuex';

    export default {
        name: "PostList",


        mounted() {
            this.loadPosts(this.$route.params.page);
        },

        computed: {
            ...mapState({
                posts: state => state.posts.all,
                currentPage: state => state.posts.currentPage,
                lastPage: state => state.posts.lastPage,
            }),
        },

        watch: {
            posts: function(posts){ if(posts.length > 0) this.$store.dispatch(types.SPINNER_STOP) },
        },

        methods:{

            loadPosts(page){
                this.$store.dispatch(types.SPINNER_RUN);
                this.$store.dispatch(types.GET_ALL_POSTS, {page:page});
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