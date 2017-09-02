<template>
    <div>
  <vuetable ref="vuetable"
            api-url="https://vuetable.ratiw.net/api/users"
            :fields="fields"
            pagination-path=""
            :per-page="20"
            @vuetable:pagination-data="onPaginationData"
  >

  </vuetable>

            <vuetable-pagination-info ref="paginationInfo"
            ></vuetable-pagination-info>
        <ul class="pagination">
            <vuetable-pagination ref="pagination"
                                 @vuetable-pagination:change-page="onChangePage"
            ></vuetable-pagination>
        </ul>
    </div>
</template>
<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable.vue'
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
    import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
    import accounting from 'accounting'
    import moment from 'moment'

    export default {
        components: {
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo
        },
        data(){
            return {
                fields: [
                    {
                        name: '__handle',
                        dataClass: 'center aligned'
                    },
                    {
                        name: '__sequence',
                        title: '#',
                        titleClass: 'center aligned',
                        dataClass: 'right aligned'
                    },
                    {
                        name: 'name',
                        sortField: 'name'
                    },
                    {
                        name: 'email',
                        sortField: 'email'
                    },
                    {
                        name: 'birthdate',
                        titleClass: 'center aligned',
                        dataClass: 'center aligned',
                        callback: 'formatDate|DD/MM/YYYY'
                    },
                    {
                        name: 'nickname',
                        sortField: 'nickname',
                        callback: 'allcap'
                    },
                    {
                        name: 'gender',
                        titleClass: 'center aligned',
                        dataClass: 'center aligned',
                        callback: 'genderLabel'
                    },
                    {
                        name: 'salary',
                        titleClass: 'center aligned',
                        dataClass: 'right aligned',
                        callback: 'formatNumber'
                    },
                ]
            }
        },
        methods: {
            allcap (value) {
                return value.toUpperCase()
            },
            genderLabel (value) {
                return value === 'M'
                    ? '<span class="ui teal label"><i class="fa fa-male" aria-hidden="true"></i>Male</span>'
                    : '<span class="ui pink label"><i class="fa fa-female" aria-hidden="true"></i></i>Female</span>'
            },
            formatNumber (value) {
                return accounting.formatNumber(value, 2)
            },
            formatDate (value, fmt = 'DD/MM/YYYY') {
                return (value == null)
                    ? ''
                    : moment(value, 'YYYY-MM-DD').format(fmt)
            },
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
                this.$refs.paginationInfo.setPaginationData(paginationData)

                this.$refs.pagination.setPaginationData(paginationData)
                this.$refs.paginationInfo.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            }
        }
    }
</script>

<style scoped="">
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: white;
    margin-top: 60px;
  }


</style>