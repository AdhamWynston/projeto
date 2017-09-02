<template>
  <vuetable ref="vuetable"
            api-url="https://vuetable.ratiw.net/api/users"
            :fields="fields"
  ></vuetable>
</template>
<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable.vue'
    import accounting from 'accounting'

    export default {
        components: {
            Vuetable
        },
        data(){
            return {
                fields: [
                    {
                        name: 'nickname',
                        callback: 'allcap'
                    },
                    'email',
                    {
                        name: 'birthdate',
                        titleClass: 'centered',
                        dataClass: 'centered'
                    },
                    {
                        name: 'nickname',
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