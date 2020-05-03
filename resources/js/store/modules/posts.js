import * as types from '../types';
import {apiRequest} from "../../api/request";


const posts = {
    state: {
        //the all posts by filters or pagination
        all: [],
        //the current selected post
        post: {},

        //the current posts page
        currentPage: 1,
        lastPage: 1,

    },

    mutations: {
        [types.SET_ALL_POSTS]: (state, payload) => {
            state.all = payload.data;
            state.currentPage = payload.current_page;
            state.lastPage = payload.last_page;
        },
    },

    actions: {
        [types.UPDATE_POST_ALL]: ({commit}, payload) => {
            commit(types.MUTATE_ALL_POSTS, payload)
        },

        [types.GET_ALL_POSTS]: ({commit}, payload) => {
            let {data} = apiRequest('post_list', '', {'page' : payload.page})
                .then(response => response.json())
                .then(response => commit(types.SET_ALL_POSTS, response));

        },
    },

    getters: {
        [types.ALL_POSTS]: state => {
            return state.all_posts;
        }
    }
}

export default posts
