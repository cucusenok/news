<template>
    <div>
        <Header/>

        <div class="container">
            <transition name="zoom" :duration="{ enter: 500, leave: 800 }">
                <router-view></router-view>
            </transition>
        </div>

        <Footer/>

    </div>
</template>

<script>
    import Header from './layout/Header'
    import Footer from './layout/Footer'

    export default {
        name: "App",

        components: {
            Footer,
            Header,
        },

        mounted() {
        },


    }
</script>

<style scoped>

</style>