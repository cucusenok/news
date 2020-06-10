<template>
    <div class="container">

        <div class="page-title fl-upper">
            <div class="post-info">
                <div>
                    <h1 v-if="this.title">{{this.title}}</h1>
                </div>
                <div class="author-rating">

                    <div v-if="this.author" class="activity__rating mr-10">
                        <font-awesome-icon :icon="['fas', 'star']" />
                        <font-awesome-icon :icon="['fas', 'star']" />
                        <font-awesome-icon :icon="['fas', 'star']" />
                        <font-awesome-icon :icon="['fas', 'star']" />
                        <font-awesome-icon :icon="['fas', 'star']" />
                    </div>

                    <div v-if="this.author" class="post-body__author">
                        <img src="https://www.buro247.ru/thumb/300x300_5/images/GettyImages-1181163940_2.jpg.webp" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="author-date">
            <div>
                <h2 v-if="this.author">{{this.author}}</h2>
            </div>
            <div>
                <div v-if="this.createdAt" class="publish-date-time">{{this.createdAt}}</div>
            </div>
        </div>


        <div class="main-image">
            <img
                    class="post-item__image"
                    :src=mainImage alt="">
        </div>

        <div class="main-text">
            <h2 v-if="this.body" v-html="this.body">{{this.body}}</h2>
        </div>
        <!-- Comments -->

        <Comments
                v-bind:id="postID">
        </Comments>

    </div>
</template>

<script>
    import Comments from '../comments/List'
    import store from "../../store/store"
    import * as types from "../../store/types"
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

    export default {
        name: "Post",

        data: function(){
            return{
                postID : this.$route.params.id,
                title : false,
                body : false,
                author: false,
                mainImage: false,
                createdAt: false,
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
                this.title = response.name;
                this.body = response.body;
                this.author = response.author.name;
                this.mainImage = response.main_image;
                this.createdAt = response.created_at;
                this.setSpinnerState(false);
            },
        },

        components:{
            Comments,
            FontAwesomeIcon,
        }

    }
</script>

<style scoped lang="scss">

    .main-text {
        margin-top: 40px;
    }

    .publish-date-time {
        font-size: 1.5em;
    }

    .author-date {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .post-info {
        font-size: 0.4em;
        display:flex;
        align-items: center;
        justify-content: space-between;
    }
</style>