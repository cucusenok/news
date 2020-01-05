import Vue from 'vue';
import {apiRequest, generateLink} from "../api/request";


Vue.mixin({
    methods: {
        apiRequest: apiRequest,
        generateLink: generateLink,

        /**
         * set state of spinner(loader)
         * @param {boolean} state
         * @return {void}
         */
        setSpinnerState(state){
            //element exist ever, creating by backend
            const spinner = document.getElementById('spinner');
            spinner.style.display = state ? 'block' : 'none';
        },
    }
});
