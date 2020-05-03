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

        spinnerRun(){
            console.log('spinner run');
            this.setSpinnerState(true);
        },

        spinnerStop(){
            console.log('spinner down');
            this.setSpinnerState(false);
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
