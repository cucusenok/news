<template>

    <div class="main-header">

        <div class="menu-container">

            <div class="menu-container__left">
                <div class="menu-container__item">
                    <router-link :to="{ name: 'home' }">{{ $t("message.home") }}</router-link>
                </div>
                <div class="menu-container__item">
                    <router-link :to="{ name: 'new-post' }">{{ $t("message.new_post") }}</router-link>
                </div>
                <div class="menu-container__item">
                    <router-link :to="{ path: '/posts/1' }">{{ $t("message.new_posts") }}</router-link>
                </div>
                <div class="menu-container__item">
                    <router-link :to="{ path: '/search' }">{{ $t("message.search") }}</router-link>
                </div>
                <div class="menu-container__item">
                    <router-link :to="{ path: '/faq' }">{{ $t("message.faq") }}</router-link>
                </div>
            </div>

            <div class="menu-container__right">

                <div v-if="userAuth" class="menu-container__item">
                    <select class="select-lang"
                            v-model="selectedLang"
                            v-on:change="langChange"
                    >

                        <option v-for="lang in langs" v-bind:value="lang.val">
                            {{ lang.name }}
                        </option>

                    </select>
                </div>

                <div v-if="userAuth" class="menu-container__item mr-20">
                    <router-link :to="{ path: '/profile' }">{{ $t("message.profile") }}</router-link>
                </div>

                <div v-if="userAuth"
                        v-on:click="logout"
                        class="menu-container__item mr-20">
                    <a>{{ $t("message.logout") }}</a>
                </div>

                <div v-if="!userAuth" class="menu-container__item mr-20">
                    <router-link :to="{ path: '/login' }">{{ $t("message.login") }}</router-link>
                </div>
                <div class="menu-container__right-item" @click="backButtonClick">{{ $t("message.back") }}</div>
            </div>

        </div>
    </div>




</template>

<script>

    import store from "../../store/store"
    import * as types from "../../store/types"
    import i18n from '../../locale/vue-i18n'

    export default {
        name: "Header",

        methods: {

            backButtonClick() {
                this.$router.go(-1);
            },

            logout(){
                this.$store.dispatch(types.AUTH_LOGOUT)
            },

            langChange(){
                //TODO: сохранить выбраный язык в locale store
                // и отправить на бек, чтобы сохранить как дефолтный
                i18n.locale = this.selectedLang;
            },

        },

        data: function() {
            return {
                selectedLang: 'ru',
                langs: [ {name: 'ru', val: 'ru'}, {name: 'en', val: 'en'}, ],
            }
        },

        computed: {
            userAuth: function () {
                return store.getters.isAuth;
            }
        }

    }


</script>

<style scoped lang="scss">

    .select-lang {
        appearance: none;
        padding: 0 7px;
        background: #2a2a2a;
        color: white;
    }

    .main-header {
        margin-top: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
    }


    .menu-container {
        font-family: Ubuntu;
        font-weight: bold;
        width: 1120px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 45px;
        background: #2a2a2a;
        color: #fff;

        &__right {
            width: 20%;
            display: flex;
            justify-content: flex-end;

            &-item {
                margin-right: 20px;

                &::first-letter{
                    text-transform: uppercase;
                }
            }
        }

        &__left {
            width: 80%;
            display: flex;
        }

        &__item {
            &::first-letter{
                text-transform: uppercase;
            }
        }

        &__item > a {
            margin-left: 20px;
            color: #fff;
        }
    }


</style>