import * as types from './types';

export default {
    [types.UPDATE_POST_ALL]: ({commit}, payload) => {
        commit(types.MUTATE_POST_ALL, payload)
    }
};