<template>

    <div class="pagination">
        <ul>
            <li data-page="currentPage">{{currentPage}}</li>

            <li v-for="i in 5"
                :data-page="i"
                @click="pageClick">
                {{i + currentPage}}
            </li>

            <li>...</li>
            <li v-if="lastPage" data-page="lastPage">{{lastPage}}</li>
        </ul>
    </div>

</template>

<script>
    export default {
        name: "Pagination",
        props: ['currentPage', 'lastPage', 'routePath'],

        methods: {
            pageClick(event) {
                console.log('fasfsa');
                const page = event.currentTarget.getAttribute('data-page');
                this.$emit('paginationChange', {route:this.$props.routePath, page: page } );
            }
        },
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


</style>