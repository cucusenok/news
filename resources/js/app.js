import Vue from 'vue'
import VueRouter from 'vue-router'
import {apiRequest, generateLink} from './api/request'


Vue.use(VueRouter)

import App from './components/App'
import Hello from './components/Hello'
import Home from './components/Home'
import Post  from "./components/post/Post"
import PostList from "./components/post/PostList"

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/posts/:page', name: 'posts', component: PostList },
        { path: '/hello',  name: 'hello', component: Hello },
        { path: '/', name: 'home', component: Home },
        { path: '/post/:id',  name: 'post', component: Post },
    ],
});



Vue.mixin({
    methods: {
        apiRequest: apiRequest,
        generateLink: generateLink,

        setSpinnerState(state){
            const spinner = document.getElementById('spinner');
            console.log(state);
            spinner.style.display = state ? 'block' : 'none';
        },
    }
});



const app = new Vue({
    el: '#app',
    components: { App },

    router,

});