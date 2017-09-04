<template>
      <form class="form-inline">
          <div class="">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
          <input type="text" v-model="filterText" id="sample1" class="mdl-textfield__input" @keyup.enter="doFilter">
            <label class="mdl-textfield__label" for="sample1"></label>
        </div>
          <button class="waves-effect waves-light btn" @click.prevent="doFilter">Go</button>
          <button class="waves-effect waves-light btn" @click.prevent="resetFilter">Reset</button>
          </div>
          <br>
      </form>

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
<style>

</style>
