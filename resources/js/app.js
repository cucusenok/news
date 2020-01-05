import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import router from  './vue-components/routes'
import * as mixin from './vue-components/mixin'
import { store } from './store/store'


const app = new Vue({
    el: '#app',
    components: { App },
    router,
    mixins: [mixin],
    store,
});