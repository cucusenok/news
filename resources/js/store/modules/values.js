import * as types from '../types';

const state = {
    counter: 0
};

const getters = {
    [types.POSTS_ALL]: state => {
        return state.counter * 2;
    },
};

const mutations = {
    [types.MUTATE_POST_ALL]: (state, payload) => {
        state.counter += payload;
    },
};

const actions = {
    [types.POSTS_ALL]: ({ commit }, payload) => {
        commit(types.MUTATE_POST_ALL, payload);
    },
};

export default {
    state,
    mutations,
    actions,
    getters
}