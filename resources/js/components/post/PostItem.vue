<template>
    
    <div    :data-post=post.id
            class="post-item"
            @click="handleClick">

        <img
                class="post-item__image"
                :src=post.main_image alt="">

        <div class="post-body">
            <div class="post-body__title">
                <div> <h2>{{post.name}}</h2> </div>
            </div>

            <div class="post-body__info">
                <div class="activity__rating">
                    <font-awesome-icon :icon="['fas', 'star']" />
                    <font-awesome-icon :icon="['fas', 'star']" />
                    <font-awesome-icon :icon="['fas', 'star']" />
                    <font-awesome-icon :icon="['fas', 'star']" />
                    <font-awesome-icon :icon="['fas', 'star']" />
                </div>

                <div class="post-body__author">
                    <img src="https://www.buro247.ru/thumb/300x300_5/images/GettyImages-1181163940_2.jpg.webp" alt="">
                </div>
            </div>

            <div class="post-body__main-text">
                <h4 v-html="bodyPreprocess">{{bodyPreprocess}}</h4>
            </div>

        </div>
    </div>

</template>

<script>
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

    export default {
        name: "PostItem",

        props: ['post'],

        methods: {
            handleClick() {
                const postID = this.$el.getAttribute('data-post')
                this.$router.push({ path: `/post/${postID}` })
            }

        },

        components: {
            FontAwesomeIcon,
        },

        computed: {
            bodyPreprocess: function () {
                const maxBodyLength = 200;
                const bodyLength = this.post.body.length;

                if(bodyLength <= maxBodyLength) return this.post.body;

                return this.post.body.slice(0, maxBodyLength) + '...';
            },

        }
    }
</script>

<style lang="scss">
    .post-item {
        max-width: 500px;
        box-shadow: 2px 0px 5px 2px rgba(125, 120, 120, 0.75);

        margin-bottom: 40px;

        &__image {
            max-width: 100%;
        }
    }

    .post-body {
        margin-top: 10px;
        padding: 0px 20px;

        &__info {
            align-items: center;
            display: flex;
            justify-content: space-between;
        }

        &__title {
        }

        &__author {
         & > img {
             max-width: 50px;
             border-radius: 50%;
            }
        }

        &__main-text {
            margin-top: 10px;
        }
    }
</style>