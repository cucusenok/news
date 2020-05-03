import * as types from '../types';
import {apiRequest} from "../../api/request";


const user = {
    state: {
        token: localStorage.getItem('user-token') || '',
        status: '',
    },

    mutations: {
        [types.AUTH_REQUEST]: (state) => {
            state.status = 'loading'
        },
        [types.AUTH_SUCCESS]: (state, token) => {
            state.status = 'success'
            state.token = token
        },
        [types.AUTH_ERROR]: (state) => {
            state.status = 'error'
        },

        [types.AUTH_LOGOUT]: (state) => {
            state.status = 'logout',
                state.token = ''
        },
    },

    actions: {

        [types.AUTH_REQUEST]: ({commit, dispatch}, data) => {
            return new Promise((resolve, reject) => { // The Promise used for router redirect in login
                commit(types.AUTH_REQUEST)
                apiRequest( 'login', data,  { method:'POST' } )
                    .then(resp => {
                        const token = resp.headers.get('Authorization')
                        console.log(token)
                        localStorage.setItem('user-token', token) // store the token in localstorage
                        commit(types.AUTH_SUCCESS, token)
                        // you have your token, now log in your user :)
                        //dispatch(types.USER_REQUEST)
                        resolve(resp)
                    })
                    .catch(err => {
                        commit(types.AUTH_ERROR, err)
                        localStorage.removeItem('user-token') // if the request fails, remove any possible user token if possible
                        reject(err)
                    })
            })
        },

        [types.AUTH_LOGOUT]: ({commit, dispatch}) => {
            return new Promise((resolve, reject) => {
                commit(types.AUTH_LOGOUT)
                localStorage.removeItem('user-token') // clear your user's token from localstorage
                resolve()
            })
        }

    },

    getters: {
        token: state => localStorage.getItem('user-token'),
        isAuth: state => !!state.token,
        authStatus: state => state.status,
    }
}

export default user