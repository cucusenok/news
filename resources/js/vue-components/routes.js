import VueRouter from 'vue-router'
import Hello from '../components/Hello'
import Home from '../components/Home'
import Post  from "../components/post/Post"
import PostList from "../components/post/PostList"
import NewPost from "../components/new-post/NewPost"
import Profile from "../components/user/Profile"
import Login from "../components/users/Login"
import store from "../store/store"


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

// ХОРОШО
router.beforeEach((to, from, next) => {
    if (to.name == 'Login' && store.getters.isAuth) next({ name: 'Profile' })
    else next()
})

export default router;