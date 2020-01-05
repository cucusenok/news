import * as types from './types';

export default {
    [types.MUTATE_POST_ALL]: (state, payload) => {
        state.value = payload;
    }
};