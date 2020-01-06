import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import router from  './vue-components/routes'
import * as mixin from './vue-components/mixin'
import { store } from './store/store'
import {mapState} from 'vuex';

Vue.config.devtools = true;

const app = new Vue({
    el: '#app',
    components: { App },

    computed: mapState(['state']),

    created() {
        this.$store.subscribe((mutation, state) => {
            if (mutation.type === 'spinner_update_state') { state.spinner.state ? this.spinnerRun() : this.spinnerStop() };
        });

    },
    router,
    mixins: [mixin],
    store,
});