import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './components/App'

import fontawesome from '@fortawesome/fontawesome';
import { library, config } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import fas from '@fortawesome/fontawesome-free-solid';
import fab from '@fortawesome/fontawesome-free-brands';


import router from  './vue-components/routes'
import * as mixin from './vue-components/mixin'
import store from './store/store'
import {mapState} from 'vuex';

fontawesome.library.add(fas, fab);

config.autoAddCss = true



Vue.use( VueRouter );



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