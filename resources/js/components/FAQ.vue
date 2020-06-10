<template>
    <div class="container">


        <div class="page-title fl-upper">
            {{$t("message.frequently_asked_questions")}}
        </div>

        <div class="search">
            <input class="search__input" type="text">
        </div>

        <div class="faq-container">
            <div class="faq-item">
                <router-link class="fl-upper" :to="{ name: 'home' }">{{ $t("message.how_to_register") }}?</router-link>
            </div>
            <div class="faq-item">
                <router-link :to="{ name: 'home' }">{{ $t("message.how_to_create_post") }}?</router-link>
            </div>
            <div class="faq-item">
                <router-link :to="{ name: 'home' }">{{ $t("message.how_to_edit_profile") }}?</router-link>
            </div>
            <div class="faq-item">
                <router-link :to="{ name: 'home' }">{{ $t("message.how_to_register") }}?</router-link>
            </div>
            <div class="faq-item">
                <router-link :to="{ name: 'home' }">{{ $t("message.how_to_register") }}?</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FAQ"
    }
</script>

<style scoped lang="scss">

    .faq-container {
        margin-top: 40px;
    }

    .faq-item {
        font-size: 2em;

        & > a {
            color:#3f5465;
            text-decoration:underline;

            &::first-letter {
                color: red;
                text-transform: uppercase;
            }
        }

    }
</style>