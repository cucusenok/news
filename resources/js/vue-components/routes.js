import VueRouter from 'vue-router'
import Hello from '../components/Hello'
import Home from '../components/Home'
import Post  from "../components/post/Post"
import PostList from "../components/post/PostList"


const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/posts/:page', name: 'posts', component: PostList },
        { path: '/hello',  name: 'hello', component: Hello },
        { path: '/', name: 'home', component: Home },
        { path: '/post/:id',  name: 'post', component: Post },
    ],
});

export default router;