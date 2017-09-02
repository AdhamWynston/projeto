<template>
    <div>

        <filter-bar></filter-bar>
        <vuetable ref="vuetable"
            api-url="https://vuetable.ratiw.net/api/users"
            :fields="fields"
            pagination-path=""
            :per-page="20"
            :sort-order="sortOrder"
            detail-row-component="my-detail-row"
            @vuetable:cell-clicked="onCellClicked"
            :appendParams="moreParams"
            @vuetable:pagination-data="onPaginationData">
        </vuetable>

    </div>
</template>
<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable.vue'
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
    import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
    import accounting from 'accounting'
    import moment from 'moment'
    import Vue from 'vue'
    import CustomActions from './CustomActions.vue'
    import DetailRow from './DetailRow'
    import FilterBar from './FilterBar'
    Vue.component('filter-bar', FilterBar)
    Vue.component('my-detail-row', DetailRow)
    Vue.component('custom-actions', CustomActions)

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
                        name: '__checkbox',   // <----
                        titleClass: 'center aligned',
                        dataClass: 'center aligned'
                    },
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
                    {
                        name: '__component:custom-actions',   // <----
                        title: 'Actions',
                        titleClass: 'center aligned',
                        dataClass: 'center aligned'
                    }
                ]
            }
        },
        methods: {
            onCellClicked (data, field, event) {
                console.log('cellClicked: ', field.name)
                this.$refs.vuetable.toggleDetailRow(data.id)
            },
            onAction (action, data, index) {
                console.log('slot) action: ' + action, data.name, index)
            },
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