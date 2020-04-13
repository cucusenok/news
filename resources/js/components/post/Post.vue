<template>
    <div>
        <h1 v-if="this.title">{{this.title}}</h1>
        <h2 v-if="this.author">{{this.author}}</h2>
        <h2 v-if="this.body" v-html="this.body">{{this.body}}</h2>

        <!-- Comments -->

        <Comments
                v-bind:id="postID">
        </Comments>

    </div>
</template>

<script>
    import Comments from '../comments/List'

    export default {
        name: "Post",

        data: function(){
            return{
                postID : this.$route.params.id,
                title : false,
                body : false,
                author: false
            }
        },

        mounted() {
            this.setSpinnerState(true);
            this.apiRequest('post_view', this.postID)
                .then(response => response.json())
                .then(response => this.setDataAttributes(response[0]));
        },

        methods: {
            setDataAttributes(response) {
                //console.log(response);
                this.title = response.name;
                this.body = response.body;
                this.author = response.author.name;
                this.setSpinnerState(false);
            },
        },

        components:{
            Comments,
        }

    }
</script>

<style scoped>

</style>