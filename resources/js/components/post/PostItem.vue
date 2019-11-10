<template>

    <div    :data-post=post.id
            @click="handleClick">

        <div class="post-body">
            <h2>{{post.name}}</h2>
            <h4>{{post.body}}</h4>
        </div>

    </div>

</template>

<script>
    export default {
        name: "PostItem",
        props: ['post'],

        methods: {

            handleClick() {
                const postID = this.$el.getAttribute('data-post')
                this.$router.push({ path: `/post/${postID}` })
            }

        },
    }
</script>

<style lang="scss">

</style>