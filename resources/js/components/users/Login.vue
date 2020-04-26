<template>

    <div class="auth-container">

        <div class="auth-form">

            <div class="auth-registration js-tabs">

                <div class="auth-registration-active" data-target-tab="auth-tab" v-on:click="tabClick">
                    Auth
                </div>

                <div v-on:click="tabClick">
                    Registration
                </div>
            </div>

            <div class="auth-tabs">

                <div class="auth js-tab" id="auth-tab">

                    <div class="auth-login">
                        <div class="form-label" >Login</div>
                        <input class="form-input" type="text">
                    </div>

                    <div class="auth-password">
                        <div class="form-label">Password</div>
                        <input class="form-input" type="text">
                    </div>

                    <div class="login-btn">
                        <button v-on:click="login">Login</button>
                    </div>
                </div>

            </div>

        </div>

    </div>


</template>

<script>
    export default {
        name: "Login",


        methods: {

            tabClick( event ){
                console.log(event.target);
            },

            login: function () {
                const {username, password} = this

                this.$store.dispatch(AUTH_REQUEST, {username, password}).then(() => {
                    this.$router.push('/')
                })
            },

        },

    }
</script>


<style lang="scss" scoped>

    .auth-tabs {
        margin-top: 20px;
    }

    .auth-registration {
        width: 45%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        &-active {
            color: #2b87b8;
            border-bottom: 1px solid #2b87b8;
        }

    }

    .form-input {
        height: 40px;
        border: 2px solid #2b87b8;
    }

    .form-label {
        color: #797676;
    }

    .auth-form {
        font-family: Ubuntu;
        font-weight: bold;
        box-shadow: 1px 5px 10px 1px rgba(0,0,0,0.5);
        flex-direction: column;
    }

    .auth-container {
        width: 100%;
        margin-top: 20%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .auth-password {
        margin-top: 20px;
    }


    .auth-form {
        width: 400px;
        height: 250px;
        background: white;
    }

    .auth-form {
        display: flex;
        justify-content: center;
        align-items: center;
    }


</style>