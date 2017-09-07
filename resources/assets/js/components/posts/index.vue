<template>
    <div class="row">
        <div class="col s12">
        <my-vuetable
                api-url="https://vuetable.ratiw.net/api/users"
                :fields="fields"
                :sort-order="sortOrder"
                :append-params="moreParams"
                detail-row-component="my-detail-row"
        >
            <template slot="actions" scope="props">
                <div class="custom-actions">
                    <button class="tooltipped waves-effect waves-circle waves-light btn-floating blue" data-tooltip="Editar cliente" data-position="top" data-delay="50"
                            @click="onAction('view-item', props.rowData, props.rowIndex)">
                        <i class="material-icons">remove_red_eye</i>
                    </button>
                    <button class="tooltipped waves-effect waves-circle waves-light btn-floating orange" data-tooltip="Editar cliente" data-position="top" data-delay="50"
                            @click="onAction('edit-item', props.rowData, props.rowIndex)">
                        <i class="material-icons">edit</i>
                    </button>
                    <button class="tooltipped waves-effect waves-circle waves-light btn-floating red" data-tooltip="Editar cliente" data-position="top" data-delay="50"
                            @click="onAction('delete-item', props.rowData, props.rowIndex)">
                        <i class="material-icons">lock_open</i>
                    </button>
                </div>
            </template>
        </my-vuetable>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import FieldDefs from '../table/FieldDefs'
    import MyVuetable from '../table/MyVuetable'
    import DetailRow from '../table/DetailRow'
    Vue.component('my-detail-row', DetailRow)
    export default {
        name: 'app',
        components: {
            MyVuetable
        },
        data () {
            return {
                fields: FieldDefs,
                sortOrder: [
                    {
                        field: 'email',
                        sortField: 'email',
                        direction: 'asc'
                    }
                ],
                moreParams: {}
            }
        },
        methods: {
            onAction (action, data, index) {
                console.log('slot action: ' + action, data.name, index)
            },
        }
    }
</script>

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>