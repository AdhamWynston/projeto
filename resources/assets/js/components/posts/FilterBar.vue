<template>
      <form class="form-inline">
          <div class="col s4">
        <div class="">
          <input type="text" v-model="filterText" id="sample1" class="mdl-textfield__input" @keyup.enter="doFilter">
            <label class="mdl-textfield__label" for="sample1"></label>
        </div>
          </div>
          <div>
          <button class="" @click.prevent="doFilter">Go</button>
          <button class="" @click.prevent="resetFilter">Reset</button>
          </div>
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
