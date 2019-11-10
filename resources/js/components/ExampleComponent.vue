<template>
    <div>

        <v-container grid-list-xl>

            <v-layout row wrap justify-column>

                <v-flex v-for="post in posts":key="post.id" xs4>

                    <v-img
                            v-bind:src= "'http://127.0.0.1:8000/storage/' + post.image"
                            aspect-ratio="2.75"
                    ></v-img>
                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0" >{{ post.title }}</h3>
                            <div v-html="post.body"></div>
                        </div>
                    </v-card-title>

                </v-flex>

            </v-layout>


            <div class="text-xs-center">
                <v-btn
                        :loading="loadingAnimation"
                        color="success"
                        @click="clickLoadButton"
                >
                    Load More
                </v-btn>

                <v-alert
                        v-if="loadAll"
                        :value="true"
                        type="info"
                >No more news</v-alert>



            </div>
        </v-container>
    </div>
</template>

<script>

    import Footer from './layout/user/Footer'
    import axios from 'axios'
    import route from '../route'

    export default {
        name: "News",

        data() {
            return {
                posts : [],
                lastid: 0,
                loader: false,
                loadingAnimation: false,
                loadAll: false
            }
        }, //end data

        mounted() {
            this.loadPost(this.lastid);
        }, //end mounted

        components:{
            'Footer' : Footer,
        }, //end components


        methods:{

            passThrough(data){
                this.loadingAnimation = false;
                if(data.length == 0){
                    this.loadAll = true;
                }
                else {
                    this.posts = this.posts.concat(data);
                    this.lastid = this.posts[this.posts.length - 1].id; //get last load id
                    return data;
                }
            },

            //int lastid - id last loading post
            loadPost(lastid){
                fetch(
                    route('api.posts.paginate', [lastid])) //getting posts start with lastid => default 0
                    .then(response => response.json())
                    .then(data => data.posts)
                    .then(data => this.passThrough(data))
                    .catch(error => console.log(error))
            }, //end loadPost


            clickLoadButton(event){
                if(event){
                    this.loadingAnimation = true; //start button animation
                    this.loadPost(this.lastid);
                }
            }//end clickLoadButton

        },  //end methods
    }
</script>

<style scoped>

    .success{
        background: #0fa30f !important;
    }

    .custom-loader {
        animation: loader 1s infinite;
        display: flex;
    }
    @-moz-keyframes loader {
        from {
            transform: rotate(0);
        }
        to {
            transform: rotate(360deg);
        }
    }
    @-webkit-keyframes loader {
        from {
            transform: rotate(0);
        }
        to {
            transform: rotate(360deg);
        }
    }
    @-o-keyframes loader {
        from {
            transform: rotate(0);
        }
        to {
            transform: rotate(360deg);
        }
    }
    @keyframes loader {
        from {
            transform: rotate(0);
        }
        to {
            transform: rotate(360deg);
        }
    }

</style>