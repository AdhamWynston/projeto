<template>
  <vuetable ref="vuetable"
            api-url="https://vuetable.ratiw.net/api/users"
            :fields="fields"
  ></vuetable>
</template>
<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable.vue'

    export default {
        components: {
            Vuetable
        },
        data(){
            return {
                fields: [
                    'name', 'email', 'birthdate',
                    {
                        name: 'address.line1',
                        title: 'Endereço 1'
                    },
                    {
                        name: 'address.line2',
                        title: 'Endereço 2'
                    },
                    {
                        name: 'address.zipcode',
                        title: 'CEP'
                    },
                ]
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