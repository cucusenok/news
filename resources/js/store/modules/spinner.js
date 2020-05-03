import * as types from '../types';
import {apiRequest} from "../../api/request";


const spinner = {
    state: {
        state: false
    },

    mutations: {
        [types.SPINNER_UPDATE_STATE]: (state, payload) => {
            state.state = payload.state;
        },
    },

    actions: {
        [types.SPINNER_RUN]: ({commit}, payload) => {
            commit(types.SPINNER_UPDATE_STATE, {state:true})
        },

        [types.SPINNER_STOP]: ({commit}, payload) => {
            commit(types.SPINNER_UPDATE_STATE, {state:false})
        },

    },

    getters: {
        [types.SPINNER_STATE]: state => {
            return state.state;
        }
    }
}

export default spinner
