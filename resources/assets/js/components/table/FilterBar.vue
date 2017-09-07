<template>
    <div class="row">
        <div align="center" class="col s10 offset-2">
        <table>
            <tr>
                <td>
                    <label>Procurar por:</label>
                    <input type="text" v-model="filterText" class="three wide column" @keyup.enter="doFilter" placeholder="title, body">
                </td>
                <td>
                    <button class="btn waves-effect waves-light blue" @click="doFilter"><i class="material-icons">search</i></button>
                    <button class="btn waves-effect waves-light grey lighten-2" @click="resetFilter"><i class="material-icons">keyboard_return</i></button>
                </td>
            </tr>
        </table>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                filterText: ''
            }
        },
        methods: {
            doFilter () {
                this.$events.fire('filter-set', this.filterText)
            },
            resetFilter () {
                this.filterText = ''
                this.$events.fire('filter-reset')
            }
        }
    }
</script>