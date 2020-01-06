import Vue from 'vue';
import Vuex from 'vuex';

import actions from './actions';
import getters from './getters';
import mutations from './mutations';
import posts from './modules/posts'
import spinner from './modules/spinner'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        all_posts: [],
        count: 0,
    },
    getters,
    mutations,
    actions,

    modules: {
        posts,
        spinner,
    }
});