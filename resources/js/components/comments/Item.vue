<template>
    <div>
        <p>{{comment.body}}</p>
    </div>
</template>

<script>
    export default {
        name: "CommentItem",
        props: ['comment'],

        mounted() {
            console.log(this.comment);
        }
    }
</script>

<style scoped>

</style>