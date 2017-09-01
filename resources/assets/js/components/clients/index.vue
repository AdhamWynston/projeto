<script>
    import VcPagination from '../pagination.vue'

    export default {
        props:{
            clients: ''
        },
        components:{
            VcPagination,
        },

        data: {
            clients: [],
        },
        data(){
            return {
                pagination: {},
            }
        },
        methods:{
            navigate (page){
                var urlClients = 'client?page='+page;
                axios.get(urlClients).then(response => {
                    this.clients = response.data.data;
                    this.pagination = response.data;
                })
            },
            desactiveClient: function (){
                toastr.success('Desativado com sucesso!')
            }
        },
        mounted (){

            var urlClients = 'client';
            axios.get(urlClients).then(response => {
                this.clients = response.data.data;
                this.pagination = response.data;
            })
        },
    }
</script>
<template>
    <div>
        <table class="highlight bordered" border="1">
            <thead>
            <tr>
                <th ><a href="#"></a>ID</th>
                <th><a href="#"></a>Nome</th>
                <th width="">Ação</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="c in clients">
                <td>{{ c.id }}</td>
                <td>{{ c.name }}</td>
                <td>
                    <a href="" class="tooltipped waves-circle waves-light btn-floating blue" data-tooltip="Visualizar cliente" data-position="top" data-delay="50"><i class="material-icons">remove_red_eye</i></a>
                    <a href="" class="tooltipped waves-effect waves-circle waves-light btn-floating orange" data-tooltip="Editar cliente" data-position="top" data-delay="50" v-on:click.prevent="editClient(c)"><i class="material-icons">edit</i></a>
                    <a href="" id="toastrSuccess" class="tooltipped waves-effect waves-circle waves-light btn-floating green" data-tooltip="Editar cliente" data-position="top" data-delay="50" v-on:click.prevent="desactiveClient()"><i class="material-icons">lock_open</i></a>
                </td>

            </tr>
            </tbody>
        </table>
        <div class="centered">
            <vc-pagination :source="pagination" @navigate="navigate" ></vc-pagination>
        </div>
    </div>
</template>
<style>

</style>