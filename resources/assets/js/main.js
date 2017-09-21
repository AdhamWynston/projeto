window.Vue = require('vue');
import state from './state'

import Vuex from 'vuex'
window.swal = require('sweetalert2');
Vue.use(Vuex);

export default new Vuex.Store({
    state
})
