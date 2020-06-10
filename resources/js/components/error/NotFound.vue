<template>
    <div class="error-container">
        <h1 class="fl-upper">{{ $t("message.page_not_found") }}</h1>
        <h2 class="fl-upper">{{ $t("message.maybe_you_mean") }}</h2>
        <div>
            <router-link :to="{ path: '/faq' }">{{ $t("message.faq") }}</router-link>
            <router-link :to="{ path: '/' }">{{ $t("message.home") }}</router-link>
        </div>

    </div>
</template>

<script>
    export default {
        name: "NotFound"
    }
</script>

<style scoped lang="scss">
    .router-link-active {
        &::first-letter {
            text-transform: uppercase;
        }
    }
</style>