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
import Login from "./components/users/Login";
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
        { path: '/login',  name: 'Login', component: Login},
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

        toBase64( file ) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => resolve(reader.result);
                reader.onerror = error => reject(error);
            }
        )},

         loginRoutine( user ) {
            return  new Promise ((resolve, reject) => {
                 this.apiRequest( 'login',  { data:user },  { method:'POST' } )
                     .then(resp => {
                         const token = resp.data.token
                         localStorage.setItem('user-token', token) // store the token in localstorage
                         resolve(resp)
                     })
                     .catch(err => {
                         localStorage.removeItem('user-token') // if the request fails, remove any possible user token if possible
                         reject(err)
                     })
             })
         }

    }
});



const app = new Vue({
    el: '#app',

    components: { App },

    router,

});