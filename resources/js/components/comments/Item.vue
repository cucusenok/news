<template>
    <div>
        <div class="comment-item">

            <div class="author-image-comment">
                <div v-if="comment" class="post-body__author">
                    <img src="https://www.buro247.ru/thumb/300x300_5/images/GettyImages-1181163940_2.jpg.webp" alt="">
                </div>

                <div class="author-comment">
                    <div v-if="comment.user">
                        <p>{{comment.user.name}}</p>
                    </div>
                    <div>
                        <p>{{comment.body}}</p>
                    </div>
                </div>
            </div>

            <div class="thumbs-up-icon">
                <font-awesome-icon :icon="['fas', 'thumbs-up']" />
            </div>
        </div>
<!--
        <div class="comment-delimiter"></div>
-->
    </div>
</template>

<script>
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

    export default {
        name: "CommentItem",
        props: ['comment'],

        mounted() {
            console.log(this.comment)
        },

        components: {
            FontAwesomeIcon
        }
    }
</script>

<style scoped lang="scss">

    .thumbs-up-icon {
        font-size: 1.5em;
    }

    .author-image-comment {
        display:flex;
    }

    .comment-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .author-comment {
        margin-left: 20px;
    }

    .comment-delimiter {
        border-bottom: 1px solid #bccadc;
        width: 80%;
        margin: auto;
        margin-top: 20px;

    }
</style>