<template>
   <div>
       <p v-if="author">Author: {{author}}</p>

       <h1 v-if="title">{{title}}</h1>
       <h3 v-if="body">{{body}}</h3>
   </div>
</template>

<script>
    
    function setDataAttributes2(response, data) {
        console.log(response);
    }

    function loadPost(data) {
        console.log(data);
    }
    
    export default {
        name: "Hello",

        data: function() {
            return {
                title: false,
                body: false,
                author: false,
            }
        },

        mounted() {


            const postID = 1;

            this.apiRequest('post_view', postID)
                .then(response => response.json())
                .then(response => this.setDataAttributes(response[0]));
        },
        
        methods:{
          setDataAttributes: function(response){
                console.log(response);
                this.title = response.name;
                this.body = response.body;
                this.author = response.author.name;
          },

            loadPost,


        },
    }
</script>

<style scoped>

</style>