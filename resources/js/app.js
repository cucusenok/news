import Vue from 'vue'
import VueRouter from 'vue-router'
import {apiRequest, generateLink} from './api/request'

import fontawesome from '@fortawesome/fontawesome';
import { library, config } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import fas from '@fortawesome/fontawesome-free-solid';
import fab from '@fortawesome/fontawesome-free-brands';

fontawesome.library.add(fas, fab);

config.autoAddCss = true
Vue.component('fa-icon', FontAwesomeIcon)


import App from './components/App'
import Hello from './components/Hello'
import Home from './components/Home'
import Post  from "./components/post/Post"
import PostList from "./components/post/PostList"
import NewPost from "./components/new-post/NewPost"
import Profile from "./components/user/Profile"
//import CKEditor from '@ckeditor/ckeditor5-vue'


Vue.use( VueRouter );
//Vue.use( CKEditor );



const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/posts/:page', name: 'posts', component: PostList },
        { path: '/hello',  name: 'hello', component: Hello },
        { path: '/', name: 'home', component: Home },
        { path: '/post/:id',  name: 'post', component: Post },
        { path: '/new-post',  name: 'new-post', component: NewPost},
        { path: '/profile',  name: 'Profile', component: Profile},
    ],
});



Vue.mixin({
    methods: {
        apiRequest: apiRequest,
        generateLink: generateLink,

        setSpinnerState(state){
            const spinner = document.getElementById('spinner');
            //console.log(state);
            spinner.style.display = state ? 'block' : 'none';
        },
    }
});



const app = new Vue({
    el: '#app',

    components: { App },

    router,

});