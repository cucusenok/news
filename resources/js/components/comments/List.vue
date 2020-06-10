<template>

    <div class="comments-list">
        <Comment v-for="comment in comments"
                 :key="comment.id"
                :comment="comment"
        >

        </Comment>
    </div>

</template>

<script>
    import Comment from './Item'

    export default {
        name: "CommentsList",
        //Оставим type - для определение к чему мы берем комментарии
        //id - для запроса
        props: ['type', 'id'],

        data(){
            return{
                comments: [],
            }
        },

        mounted() {
           this.apiRequest('comment_list_by_post_id', this.id)
                .then(response => response.json())
                .then(response => this.setDataAttributes(response));

            this.getComments(this.id);
        },

        methods:{
            getComments(id){
            },

            setDataAttributes(response){
                this.comments = response.data;
                console.log('------------+---------')
                console.log(this.comments)
            }
        },

        components:{
            Comment,
        }


    }
</script>

<style scoped lang="scss">

    .comments-list {
        margin-top: 40px;
    }

</style>