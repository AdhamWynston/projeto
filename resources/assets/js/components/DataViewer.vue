<template>
    <div class="dv">
        <div class="dv-header">
            <div class="col s2">
                {{title}}
            </div>
                <select v-model="selected">
                    <option v-for="column in column">{{column}}</option>
                </select>

                <label class="centered">Procurar</label>
            <div class="input-field col s1">
                <select>
                    <option value="1">=</option>
                </select>
                <label class="centered">Operador</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">Pesquisa</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['source','title'],
        data: {
            selected: 'bar'
        },
        data(){
            return {
                model: {},
                columns: {}
            }
        },
        created(){
            this.fetchIndexData()
        },
        methods: {
            fetchIndexData(){
                var vm = this
                axios.get(this.source)
                    .then(function(response){
                    Vue.set(vm.$data,'model', response.data.model)
                        Vue.set(vm.$data,'columns',response.data.columns)
                    })
                    .catch(function(response){
                        console.log(response)
                    })
            }
        }
    }
</script>

<style>
</style>