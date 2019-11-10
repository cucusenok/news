<template>
    <div>
        <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'hello' }">Hello</router-link> |
            <router-link :to="{ name: 'posts' }">Posts</router-link>
        </p>

        <br><br><br>

        <div @click="backButtonClick">Назад</div>


    </div>





</template>

<script>
    export default {
        name: "Header",

        methods: {

            backButtonClick() {
                this.$router.go(-1);
            }

        },

    }


</script>

<style scoped lang="scss">

</style>