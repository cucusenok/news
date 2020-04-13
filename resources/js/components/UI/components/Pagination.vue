<template>

    <div class="pagination">
        <ul>

            <li v-if="currentPage!=1"
                    data-type="back"
                @click="pageClick">
                <arrow class="pagination-arrow"
                       v-bind:width="20"
                       v-bind:height="20">
                </arrow>
            </li>

            <li data-type="page" data-page="currentPage">{{currentPage}}</li>


            <li
                    data-type="page" date v-for="i in this.pageCount"
                :data-page="i+currentPage"
                @click="pageClick">
                {{i + currentPage}}
            </li>

            <li  v-if="currentPage < lastPage - this.pageCount" :data-page="lastPage" data-type="page" @click="pageClick">{{lastPage}}</li>

            <li v-if="lastPage != currentPage" data-type="forward"
                @click="pageClick">

                <arrow class="pagination-arrow mirror-scale"
                v-bind:width="20"
                v-bind:height="20">
                </arrow>

            </li>

        </ul>
    </div>

</template>

<script>
    import Arrow from "../SVG/Arrow"

    export default {
        name: "Pagination",
        props: ['currentPage', 'lastPage', 'routePath'],

        data(){
            return{
                pageCount:5,
            }
        },

        mounted(){
            //console.log(this.currentPage);
/*            if(this.currentPage >= (this.lastPage - this.pageCount) ){

                this.pageCount = this.lastPage - this.currentPage;
                console.log(this.pageCount);
                console.log(this.lastPage - this.pageCount);
            }*/
        },

        methods: {
            pageClick(event) {


                const buttonType = event.currentTarget.getAttribute('data-type');
                let page = event.currentTarget.getAttribute('data-page');

                page = (buttonType == 'page') ? page :
                    (buttonType == 'forward') ? (this.currentPage + 1) : (this.currentPage- 1);

                this.changePage(page);
            },

            changePage(page){
                this.$emit('paginationChange', page );
            }
        },

        components:{
            arrow: Arrow,
        }

    }
</script>

<style scoped>

    .pagination li{
        width: 40px;
        border-radius: 10px;
        display: inline-block;
        margin-left: 5px;
        text-align:center;
        background: #000;
        padding: 5px;
        text-decoration: none;
        color:white;
        list-style-type: none;
    }

    .pagination-arrow{
        filter: invert(1);
    }

    .mirror-scale{
        transform: scale(-1, 1);
    }


</style>